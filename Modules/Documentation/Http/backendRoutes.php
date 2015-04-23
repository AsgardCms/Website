<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/documentation'], function (Router $router) {
    $router->get('docs', [
        'as' => 'admin.docs.index',
        'uses' => 'DocumentationController@index',
    ]);

    $router->post('docs/refresh', [
        'as' => 'admin.docs.refresh',
        'uses' => 'DocumentationController@refresh',
    ]);
});
