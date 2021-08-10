<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\SkillModel;
use App\Models\UserModel;
use App\Libraries\View;

class SkillController extends Controller
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

    public function create()
    {
        View::render('skills/create.view',[
            'method'    => 'POST',
            'action'    => '/skill/store'
        ]);
    }

    public function store()
    {
        //Save the $_POST in the skill variable
        $skill = $_POST;

        //Add the user, created_by, and created fields
        $skill['user_id'] = Helper::getUserIdFromSession();
        $skill['created_by'] = Helper::getUserIdFromSession();
        $skill['created'] = date('Y-m-d H:i:s');

        //store this in your database
        SkillModel::load()->store($skill);

        //return to the skill-list of this user
        header("Location: /skills");
    }

    public function edit()
    {
        $skillId = Helper::getIdFromUrl('skill');
        $skill = SkillModel::load()->get($skillId);

        View::Render('skills/edit.view', [
            'method'    => 'POST',
            'action'    => '/skill/' . $skillId .  '/update',
            'skill'     => $skill
        ]);
    }

    public function update()
    {
        //Save the $_POST in the skill variable
        $skillId = helper::getIdFromUrl('skill');
        $skill = $_POST;

        //Add the user, created_by, and created fields
        $skill['user_id'] = Helper::getUserIdFromSession();
        $skill['updated_by'] = Helper::getUserIdFromSession();
        $skill['updated'] = date('Y-m-d H:i:s');

        //update this in your database
        SkillModel::load()->update($skill, $skillId);

        //return to the skill-list of this user
        header("Location: /skills");
    }

    public function destroy()
    {
        $skillId = Helper::getIdFromUrl('skill');
        SkillModel::load()->destroy($skillId);
        
        header("Location: /skills");
    }
}