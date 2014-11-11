<?php

$router->get('/', 'HomeController@index');

$router->get();

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
