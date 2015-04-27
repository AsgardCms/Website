<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('account', [
    'as' => 'user.account',
    'uses' => 'Frontend\ProfileController@show',
]);

$router->post('account', [
    'as' => 'user.account.update',
    'uses' => 'Frontend\ProfileController@update',
]);

$router->get('beta-access', [
    'as' => 'user.beta',
    'uses' => 'Frontend\ProfileController@beta',
]);
