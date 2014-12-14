<?php

use Illuminate\Routing\Router;

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
$router->get('install', ['as' => 'install', 'uses' => 'FrontController@getInstallPage']);
$router->get('faq', ['as' => 'faq', 'uses' => 'FrontController@getFaq']);

$router->group(['prefix' => 'api', 'namespace' => 'Api'], function (Router $router) {
    $router->post('subscribe', ['as' => 'subscribe', 'uses' => 'EmailController@subscribe']);
});

$router->get('docs', ['as' => 'doc.index', 'uses' => 'DocumentationController@index']);
$router->get('docs/{page}', ['as' => 'doc.show', 'uses' => 'DocumentationController@show'])->where('page', '.*');
