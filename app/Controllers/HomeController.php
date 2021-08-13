<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\UserModel;
use App\Models\JobModel;
use App\Models\EducationModel;
use App\Models\VolunteerJobModel;
use App\Models\SkillModel;
use App\Models\HobbyModel;

class HomeController {

    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        $user = UserModel::load()->get($userId);
        $jobs = JobModel::load()->getAllByUserId($userId);
        $educations = EducationModel::load()->getAllByUserId($userId);
        $volunteerJobs = VolunteerJobModel::load()->getAllByUserId($userId);
        $skills = SkillModel::load()->getAllByUserId($userId);
        $hobbies = HobbyModel::load()->getAllByUserId($userId);

        return View::render('site/home.view',[
            'user'          => $user,
            'jobs'          => $jobs,
            'educations'    => $educations,
            'volunteerjobs' => $volunteerJobs,
            'skills'        => $skills,
            'hobbies'       => $hobbies
        ]);
    }

}