<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Models\HobbyModel;
use App\Models\UserModel;
use App\Libraries\View;
use App\Middleware\Permissions;

class HobbyController extends Controller
{
    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        $user = UserModel::load()->get($userId);
        $hobbies = HobbyModel::load()->getAllByUserId($userId);

        View::render('hobbies/index.view', [
            'hobbies'   => $hobbies,
            'user'      => $user
        ]);
    }

    public function create()
    {
        View::render('hobbies/create.view', [
            'method'    => 'POST',
            'action'    => '/hobby/store'
        ]);
    }

    public function store()
    {
        //Save from $_POST
        $hobby = $_POST;

        //Add user_id, created and created_by
        $hobby['user_id'] = Helper::getUserIdFromSession();
        $hobby['created_by'] = Helper::getUserIdFromSession();
        $hobby['created'] = date('Y-m-d H:i:s');

        //store this in your database
        HobbyModel::load()->store($hobby);

        //return to the hobby-overview
        header("Location: /hobby");
    }

    public function edit()
    {
        $hobbyId = Helper::getIdFromUrl('hobby');
        $hobby = HobbyModel::load()->get($hobbyId);

        Permissions::checkIdsFromSessionAndUrl($hobby->user_id);
       
        View::render('hobbies/edit.view', [
            'method'    => 'POST',
            'action'    => '/hobby/' . $hobbyId . '/update',
            'hobby'     => $hobby
        ]);
              
    }

    public function update()
    {
        $hobbyId = Helper::getIdFromUrl('hobby');
        $hobby = $_POST;

        $hobby['user_id'] = Helper::getUserIdFromSession();
        $hobby['updated_by'] = Helper::getUserIdFromSession();
        $hobby['updated'] = date('Y-m-d H:i:s');

        HobbyModel::load()->update($hobby, $hobbyId);

        header("Location: /hobby");
    }

    public function destroy()
    {
        $hobbyId = Helper::getIdFromUrl('hobby');
        $hobby = HobbyModel::load()->get($hobbyId);

        Permissions::checkIdsFromSessionAndUrl($hobby->user_id);
        HobbyModel::load()->destroy($hobbyId);
        header("Location: /hobby");
    }
}