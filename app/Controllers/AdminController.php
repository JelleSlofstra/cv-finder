<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\UserModel;

class AdminController
{

    public function index()
    {
        $users = UserModel::load()->all();
        $userId = Helper::getUserIdFromSession();
        $role = UserModel::load()->role($userId);
        
        if ($role===1||$role===2) {
            return View::render('admin/main.view', [
                'users'     => $users
            ]);
        }
        else 
        {
            header("Location: /");
        }
    }
}