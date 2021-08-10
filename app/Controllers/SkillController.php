<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\SkillModel;
use App\Models\UserModel;
use App\Libraries\View;

class SkillController
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        $skills = SkillModel::load()->getAllByUserId($userId);

        View::render('skills/index.view', [
            'skills'    => $skills,
            'user'      => UserModel::load()->get($userId)
        ]);
    }
}