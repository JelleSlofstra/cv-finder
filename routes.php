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
    'auth' => WhenNotLoggedin::class,]);

//
//User Routes
//

$router->get('users', 'App/Controllers/UserController.php@index', [
    'show' => Permissions::class]);

$router->get('user', 'App/Controllers/UserController.php@show', [
    'read' => Permissions::class]);

$router->get('user/{id}/edit', 'App/Controllers/UserController.php@edit', [
    'edit' => Permissions::class]);

$router->get('user/create', 'App/Controllers/UserController.php@create');

$router->post('user/{id}/update', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class]);

$router->post('user/store', 'App/Controllers/UserController.php@store', [
    'store' => Permissions::class]);

$router->get('user/{id}/destroy', 'App/Controllers/UserController.php@destroy', [
    'delete' => Permissions::class]);

//
//Education Routes
//

$router->get('education/create', 'App/Controllers/EducationController.php@create');

$router->post('education/store', 'App/Controllers/EducationController.php@store');

$router->get('educations', 'App/Controllers/EducationController.php@index');

$router->get('education/{id}/edit', 'App/Controllers/EducationController.php@edit');

$router->post('education/{id}/update', 'App/Controllers/EducationController.php@update');

$router->get('education/{id}/destroy', 'App/Controllers/EducationController.php@destroy');

//
//job Routes
//

$router->get('job/create', 'App/Controllers/JobController.php@create');

$router->post('job/store', 'App/Controllers/JobController.php@store');

$router->get('jobs', 'App/Controllers/JobController.php@index');

$router->get('job/{id}/edit', 'App/Controllers/JobController.php@edit');

$router->post('job/{id}/update', 'App/Controllers/JobController.php@update');

$router->get('job/{id}/destroy', 'App/Controllers/JobController.php@destroy');

//
//volunteerjob Routes
//

$router->get('volunteerjob/create', 'App/Controllers/VolunteerJobController.php@create');

$router->post('volunteerjob/store', 'App/Controllers/VolunteerJobController.php@store');

$router->get('volunteerjobs', 'App/Controllers/VolunteerJobController.php@index');

$router->get('volunteerjob/{id}/edit', 'App/Controllers/VolunteerJobController.php@edit');

$router->post('volunteerjob/{id}/update', 'App/Controllers/VolunteerJobController.php@update');

$router->get('volunteerjob/{id}/destroy', 'App/Controllers/VolunteerJobController.php@destroy');

//
//Skill routes
//

$router->get('skill/create', 'App/Controllers/SkillController.php@create');

$router->post('skill/store', 'App/Controllers/SkillController.php@store');

$router->get('skills', 'App/Controllers/SkillController.php@index');

$router->get('skill/{id}/edit', 'App/Controllers/SkillController.php@edit');

$router->post('skill/{id}/update', 'App/Controllers/SkillController.php@update');

$router->get('skill/{id}/destroy', 'App/Controllers/SkillController.php@destroy');

//
//Hobby routes
//

$router->get('hobby/create', 'App/Controllers/HobbyController.php@create');

$router->post('hobby/store', 'App/Controllers/HobbyController.php@store');

$router->get('hobbies', 'App/Controllers/HobbyController.php@index');

$router->get('hobby/{id}/edit', 'App/Controllers/HobbyController.php@edit');

$router->post('hobby/{id}/update', 'App/Controllers/HobbyController.php@update');

$router->get('hobby/{id}/destroy', 'App/Controllers/HobbyController.php@destroy');

//
//Other Routes
//

$router->get('me', 'App/Controllers/ProfileController.php@index');

$router->get('', 'App/Controllers/HomeController.php@index', [
    'auth' => WhenNotLoggedin::class,]);
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');