<?php

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
$router->get('install', 'FrontController@getInstallPage');

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
