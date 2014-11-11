<?php

$router->get('/', 'HomeController@index');

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
