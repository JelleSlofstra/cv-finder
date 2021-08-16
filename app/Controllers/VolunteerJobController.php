<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\VolunteerJobModel;
use App\Models\UserModel;
use App\Libraries\View;

class VolunteerJobController extends Controller
{
    /**
     * Show's a list of volunteerjobs for one user
     */
    public function index()
    {
        //Get the userId, userInfo and the volunteerjobs for this user
        $userId = Helper::getUserIdFromSession();
        $volunteerJobs = VolunteerJobModel::load()->getAllByUserId($userId);
        $user = UserModel::load()->get($userId);

        //Render the view with this information
        return View::render('volunteerjobs/index.view', [
            'volunteerjobs' => $volunteerJobs,
            'user'          => $user
        ]);
    }

    /**
     * Show a form to create a new volunteerjob
     */
    public function create()
    {
        //open a form with information about the Method, action and users 
        return View::render('volunteerjobs/create.view', [
            'method'    => 'POST',
            'action'    => '/volunteerjob/store',
            'users' => UserModel::load()->all()
        ]);
    }
    
    /**
    * Store a volunteerjob record into the database
    */
    public function store()
    {
        // Save post data in $volunteerJob var
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $volunteerJob = $_POST;

        // Set created_by ID and set the date of creation
        $volunteerJob['user_id'] = Helper::getUserIdFromSession();
        $volunteerJob['created_by'] = Helper::getUserIdFromSession();
        $volunteerJob['created'] = date('Y-m-d H:i:s');

        // Save the record to the database
        VolunteerJobModel::load()->store($volunteerJob);
        
        // Return to the user-overview        
        $userId = $volunteerJob['user_id'];
        header("Location: /volunteerjobs");
    }

    /**
     * Show a form to edit a volunteerjob record
     */
    public function edit()
    {
        $volunteerJobId = Helper::getIdFromUrl('volunteerjob');
        $volunteerJob = VolunteerJobModel::load()->get($volunteerJobId);

        if ($volunteerJob->user_id == Helper::getUserIdFromSession())
        {
            return View::render('volunteerjobs/edit.view', [
                'method'        => 'POST',
                'action'        => '/volunteerjob/' . $volunteerJobId . '/update',
                'volunteerjob'  => $volunteerJob,
                'users'         => UserModel::load()->all()
            ]);
        }
        else
        {
            return View::render('errors/403.view', [
                'message'   => 'Je mag alleen je eigen vrijwilligerswerk aanpassen'
            ]);
        }
    }

    /**
     * Updates a volunteerjob record into the database
     */
    public function update()
    {
        $volunteerJobId = Helper::getIdFromUrl('volunteerjob');
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $volunteerJob = $_POST;

        // Set updated_by ID and set the date of updating
        $volunteerJob['user_id'] = Helper::getUserIdFromSession();
        $volunteerJob['updated_by'] = Helper::getUserIdFromSession();
        $volunteerJob['updated'] = date('Y-m-d H:i:s');

        // Update the record in the database
        VolunteerJobModel::load()->update($volunteerJob, $volunteerJobId);

        // Return to the user-overview
        $userId = $volunteerJob['user_id'];
        header("Location: /volunteerjobs");

    }


    /**
     * Archive a volunteerjob record into the database (soft delete)
     */
    public function destroy()
    {
        $volunteerJobId = Helper::getIdFromUrl('volunteerjob');
        $userId = VolunteerJobModel::load()->get($volunteerJobId)->user_id;

        if ($userId == Helper::getUserIdFromSession())
        {
            VolunteerJobModel::load()->destroy($volunteerJobId);
            header("Location: /volunteerjobs");
        }
        else
        {
            return View::render('errors/403.view', [
                'message'   => 'Je mag alleen je eigen vrijwilligerswerk verwijderen'
            ]);
        }
    }
}