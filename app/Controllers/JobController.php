<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\JobModel;
use App\Models\UserModel;
use App\Libraries\View;

class JobController extends Controller
{

    /**
     * Show's a list of jobs for one user
     */
    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        $jobs = JobModel::load()->getAllByUserId($userId);
        $user = UserModel::load()->get($userId);

        return View::render('jobs/index.view', [
            'jobs'  => $jobs,
            'user'  => $user
        ]);
    }

    /**
     * Show a form to create a new job
     */
    public function create()
    {  
        return View::render('jobs/create.view', [
            'method'    => 'POST',
            'action'    => '/job/store',
            'users'     => UserModel::load()->all()
        ]);
    }

    /**
     * Store a job record into the database
     */
    public function store()
    {
        // Save post data in $job var
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $job = $_POST;

        // Set created_by ID and set the date of creation
        $job['user_id'] = Helper::getUserIdFromSession();
        $job['created_by'] = Helper::getUserIdFromSession();
        $job['created'] = date('Y-m-d H:i:s');

        // Save the record to the database
        JobModel::load()->store($job);
        
        // Return to the job-overview
        header("Location: /jobs");
    }

    /**
     * Show a form to edit a job record
     */
    public function edit()
    {
        $jobId = Helper::getIdFromUrl('job');
        $job = JobModel::load()->get($jobId);

        return View::render('jobs/edit.view', [
            'method'    => 'POST',
            'action'    => '/job/' . $jobId . '/update',
            'job'       => $job
        ]);
    }

    /**
     * Updates a job record into the database
     */
    public function update()
    {
        $jobId = Helper::getIdFromUrl('job');
        if(!(int)$_POST['end_year']){
            $_POST['end_year'] = NULL;
        }
        $job = $_POST;

        // Set updated_by ID and set the date of updating
        $job['user_id'] = Helper::getUserIdFromSession();
        $job['updated_by'] = Helper::getUserIdFromSession();
        $job['updated'] = date('Y-m-d H:i:s');

        // Update the record in the database
        JobModel::load()->update($job, $jobId);

        // Return to the job-overview
        header("Location: /jobs");

    }

    /**
     * Show job record
     */
    public function show()
    {
       
    }

    /**
     * Archive a job record into the database (soft delete)
     */
    public function destroy()
    {
        $jobId = Helper::getIdFromUrl('job');
        JobModel::load()->destroy($jobId);
        header("Location: /jobs");
    }

}

