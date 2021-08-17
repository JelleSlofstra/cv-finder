<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\EducationModel;
use App\Models\UserModel;
use App\Libraries\View;
use App\Middleware\Permissions;

class EducationController extends Controller
{

    /**
     * Shows a list of educations for one user
     */
    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        $educations = EducationModel::load()->getAllByUserId($userId);
        $user = UserModel::load()->get($userId);

        View::render('educations/index.view',[
            'educations' => $educations,
            'user' => $user
        ]);
    }

    /**
     * Show a form to create a new education
     */
    public function create()
    {   
        View::render('educations/create.view', [
            'method'    => 'POST',
            'action'    => '/education/store'
        ]);
    }

    /**
     * Store a education record into the database
     */
    public function store()
    {        
        // Save post data in $education var
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $education = $_POST;

        // Set created_by ID and set the date of creation
        $education['user_id'] = Helper::getUserIdFromSession();
        $education['created_by'] = Helper::getUserIdFromSession();
        $education['created'] = date('Y-m-d H:i:s');

        // Save the record to the database
        EducationModel::load()->store($education);
        
        // Return to the user-overview
        header("Location: /education");
    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $educationId = Helper::getIdFromUrl('education');
        $education = EducationModel::load()->get($educationId);

        Permissions::checkIdsFromSessionAndUrl($education->user_id);

        View::render('educations/edit.view', [
            'method'    => 'POST',
            'action'    => '/education/' . $educationId . '/update',
            'education' => $education          
        ]);        
    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        $educationId = Helper::getIdFromUrl('education');
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $education = $_POST;

        // Set updated_by ID and set the date of updating
        $education['user_id'] = Helper::getUserIdFromSession();
        $education['updated_by'] = Helper::getUserIdFromSession();
        $education['updated'] = date('Y-m-d H:i:s');

        // Update the record in the database
        EducationModel::load()->update($education, $educationId);

        // Return to the user-overview
        header("Location: /education");
    }

    /**
     * Archive a education record in the database (soft delete)
     */
    public function destroy()
    {
        $educationId = Helper::getIdFromUrl('education');
        $education = EducationModel::load()->get($educationId);

        Permissions::checkIdsFromSessionAndUrl($education->user_id);
        
        EducationModel::load()->destroy($educationId); 
        header("Location: /education");
    }

}

