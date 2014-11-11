<?php

$router->get('/', 'HomeController@index');
$router->get('install', 'FrontController@getInstallPage');

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
