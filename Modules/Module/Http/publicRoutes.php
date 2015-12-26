<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['middleware' => 'logged.in'], function (Router $router) {
    get('account/modules', ['uses' => 'Frontend\ModuleController@index', 'as' => 'p.modules.index']);
});
