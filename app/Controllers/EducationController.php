<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\EducationModel;
use App\Models\UserModel;
use App\Libraries\View;

class EducationController extends Controller
{

    /**
     * Show's a list of users
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
     * Show a form to create a new user
     */
    public function create()
    {   
        
    }

    /**
     * Store a user record into the database
     */
    public function store()
    {
        
    }

    /**
     * Show a form to edit a user record
     */
    public function edit()
    {

    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {

    }

    /**
     * Show user record
     */
    public function show()
    {
       
    }

    /**
     * Archive a user record into the database (soft delete)
     */
    public function destroy()
    {
        
    }

}

