<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\EducationModel;
use App\Models\UserModel;
use App\Libraries\View;

class EducationController extends Controller
{

    /**
     * Show's a list of educations for one user
     */
    public function index()
    {
        $userId = Helper::getIdFromUrl('user');
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
        return View::render('educations/create.view', [
            'method'    => 'POST',
            'action'    => '/education/store',
            'users'     => UserModel::load()->all(),
        ]);
    }

    /**
     * Store a education record into the database
     */
    public function store()
    {        
        // Save post data in $education var
        $education = $_POST;

        // Set created_by ID and set the date of creation
        $education['created_by'] = Helper::getUserIdFromSession();
        $education['created'] = date('Y-m-d H:i:s');

        // Save the record to the database
        EducationModel::load()->store($education);
        
        // Return to the user-overview
        $userId = $education['user_id'];
        header("Location: /user/$userId/educations");
    }

    /**
     * Show a form to edit a education record
     */
    public function edit()
    {
        $educationId = Helper::getIdFromUrl('education');
        $education = EducationModel::load()->get($educationId);

        return View::render('educations/edit.view', [
            'method'    => 'POST',
            'action'    => '/education/' . $educationId . '/update',
            'education' => $education,
            'users'     => UserModel::load()->all(),            
        ]);
    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        $educationId = Helper::getIdFromUrl('education');
        $education = $_POST;

        // Set updated_by ID and set the date of updating
        $education['updated_by'] = Helper::getUserIdFromSession();
        $education['updated'] = date('Y-m-d H:i:s');

        // Update the record in the database
        EducationModel::load()->update($education, $educationId);

        // Return to the user-overview
        $userId = $education['user_id'];
        header("Location: /user/$userId/educations");
    }

    /**
     * Show education record
     */
    public function show()
    {
       
    }

    /**
     * Archive a education record into the database (soft delete)
     */
    public function destroy()
    {
        $educationId = Helper::getIdFromUrl('education');
        $userId = EducationModel::load()->get($educationId)->user_id;
        EducationModel::load()->destroy($educationId);
        header("Location: /user/$userId/educations");
    }

}

