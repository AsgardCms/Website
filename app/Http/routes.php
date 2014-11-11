<?php

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
$router->get('install', ['as' => 'install', 'uses' => 'FrontController@getInstallPage']);

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
