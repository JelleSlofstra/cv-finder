<?php

/** --------------------------------------------------------------------------------------------------------
 * Add your routes here.
 * At this point, variables in a route are not supported like in Laravel: user/{user_id}/edit
 *  I add this in a future version.
 * 
 * Protect your routes with one ore more Middleware classes, like WhenNotLoggedIn or Permissions.
 *  See the classes for more information.
 * Add Middleware in an associative array with a key, like the admin route
 * ---------------------------------------------------------------------------------------------------------
*/

use App\Middleware\WhenNotLoggedin;
use App\Middleware\Permissions;


$router->get('admin', 'App/Controllers/AdminController.php@index', [
    'auth' => WhenNotLoggedin::class
]);
    

// $router->get('errors/403', 'App/Controllers/EducationController.php@create');

//
//User Routes
//

$router->get('user', 'App/Controllers/UserController.php@show', [
    'read' => Permissions::class
]);

$router->get('user/{id}/edit', 'App/Controllers/UserController.php@edit', [
    'update' => Permissions::class
]);

$router->get('user/create', 'App/Controllers/UserController.php@create', [
    'create' => Permissions::class
]);

$router->post('user/{id}/update', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

$router->post('user/store', 'App/Controllers/UserController.php@store', [
    'create' => Permissions::class
]);

$router->get('user/{id}/destroy', 'App/Controllers/UserController.php@destroy', [
    'delete' => Permissions::class
]);

//
//Education Routes
//

$router->get('education/create', 'App/Controllers/EducationController.php@create', [
    'create' => Permissions::class
]);

$router->post('education/store', 'App/Controllers/EducationController.php@store', [
    'create' => Permissions::class
]);

$router->get('education', 'App/Controllers/EducationController.php@index', [
    'show' => Permissions::class
]);

$router->get('education/{id}/edit', 'App/Controllers/EducationController.php@edit', [
    'update' => Permissions::class
]);

$router->post('education/{id}/update', 'App/Controllers/EducationController.php@update', [
    'update' => Permissions::class
]);

$router->get('education/{id}/destroy', 'App/Controllers/EducationController.php@destroy', [
    'delete' => Permissions::class
]);

//
//job Routes
//

$router->get('job/create', 'App/Controllers/JobController.php@create', [
    'create' => Permissions::class
]);

$router->post('job/store', 'App/Controllers/JobController.php@store', [
    'create' => Permissions::class
]);

$router->get('job', 'App/Controllers/JobController.php@index', [
    'show' => Permissions::class
]);

$router->get('job/{id}/edit', 'App/Controllers/JobController.php@edit', [
    'update' => Permissions::class
]);

$router->post('job/{id}/update', 'App/Controllers/JobController.php@update', [
    'update' => Permissions::class
]);

$router->get('job/{id}/destroy', 'App/Controllers/JobController.php@destroy', [
    'delete' => Permissions::class
]);

//
//volunteerjob Routes
//

$router->get('volunteerjob/create', 'App/Controllers/VolunteerJobController.php@create', [
    'create' => Permissions::class
]);

$router->post('volunteerjob/store', 'App/Controllers/VolunteerJobController.php@store', [
    'create' => Permissions::class
]);

$router->get('volunteerjob', 'App/Controllers/VolunteerJobController.php@index', [
    'show' => Permissions::class
]);

$router->get('volunteerjob/{id}/edit', 'App/Controllers/VolunteerJobController.php@edit', [
    'update' => Permissions::class
]);

$router->post('volunteerjob/{id}/update', 'App/Controllers/VolunteerJobController.php@update', [
    'update' => Permissions::class
]);

$router->get('volunteerjob/{id}/destroy', 'App/Controllers/VolunteerJobController.php@destroy', [
    'delete' => Permissions::class
]);

//
//Skill routes
//

$router->get('skill/create', 'App/Controllers/SkillController.php@create', [
    'create' => Permissions::class
]);

$router->post('skill/store', 'App/Controllers/SkillController.php@store', [
    'create' => Permissions::class
]);

$router->get('skill', 'App/Controllers/SkillController.php@index', [
    'show' => Permissions::class
]);

$router->get('skill/{id}/edit', 'App/Controllers/SkillController.php@edit', [
    'update' => Permissions::class
]);

$router->post('skill/{id}/update', 'App/Controllers/SkillController.php@update', [
    'update' => Permissions::class
]);

$router->get('skill/{id}/destroy', 'App/Controllers/SkillController.php@destroy', [
    'delete' => Permissions::class
]);

//
//Hobby routes
//

$router->get('hobby/create', 'App/Controllers/HobbyController.php@create', [
    'create' => Permissions::class
]);

$router->post('hobby/store', 'App/Controllers/HobbyController.php@store', [
    'create' => Permissions::class
]);

$router->get('hobby', 'App/Controllers/HobbyController.php@index', [
    'show' => Permissions::class
]);

$router->get('hobby/{id}/edit', 'App/Controllers/HobbyController.php@edit', [
    'update' => Permissions::class
]);

$router->post('hobby/{id}/update', 'App/Controllers/HobbyController.php@update', [
    'update' => Permissions::class
]);

$router->get('hobby/{id}/destroy', 'App/Controllers/HobbyController.php@destroy', [
    'delete' => Permissions::class
]);

//
//Other Routes
//

$router->get('me', 'App/Controllers/ProfileController.php@index');

$router->get('', 'App/Controllers/HomeController.php@index', [
    'auth' => WhenNotLoggedin::class
]);
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');