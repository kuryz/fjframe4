<?php
/*
|--------------------------------------------------------------
| FjFrame Application Routes
|--------------------------------------------------
|
| Here is where you place all routes for the application.
| It's a breeze. Simply tell FjFrame the URIs it should respond to
| and give it the controller to call when that URI is requested.
| An example would be $route->go('user-edit'); not ('user/edit')
|
*/




$route->go('/', 'welcome@index');
$route->go('/about', 'welcome@aboutx');
$route->go('/login', 'auth@login');
$route->go('/register', 'auth@register');
$route->go('/logout', 'auth@logout');


$route->submit();
?>