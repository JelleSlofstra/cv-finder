<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Libraries\QueryBuilder;

class AdminController
{

    public function index()
    {
        return View::render('admin/main.view');
    }
}