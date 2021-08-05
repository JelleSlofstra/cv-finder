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
    'auth' => WhenNotLoggedin::class,
]);

$router->get('user', 'App/Controllers/UserController.php@index', [
    'show' => Permissions::class
]);

$router->get('user/{id}', 'App/Controllers/UserController.php@show', [
    'read' => Permissions::class
]);

$router->get('user/{id}', 'App/Controllers/UserController.php@show', [
    'show' => Permissions::class
]);

$router->get('user/{id}/edit', 'App/Controllers/UserController.php@edit', [
    'edit' => Permissions::class
]);

$router->get('user/create', 'App/Controllers/UserController.php@create');

$router->post('user/{id}/update', 'App/Controllers/UserController.php@update', [
    'update' => Permissions::class
]);

$router->post('user/store', 'App/Controllers/UserController.php@store', [
    'store' => Permissions::class
]);

$router->get('user/{id}/destroy', 'App/Controllers/UserController.php@destroy', [
    'delete' => Permissions::class
]);

$router->get('user/{id}/educations', 'App/Controllers/EducationController.php@index', [
    'show' => Permissions::class
]);

$router->get('me', 'App/Controllers/ProfileController.php@index');

$router->get('', 'App/Controllers/HomeController.php@index');
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');