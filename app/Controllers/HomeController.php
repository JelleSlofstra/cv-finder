<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Models\UserModel;

class HomeController {

    public function index()
    {
        $user = UserModel::load();

        return View::render('site/home.view');
    }

}