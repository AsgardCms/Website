<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->post('subscribe', ['as' => 'subscribe', 'uses' => 'EntryController@subscribe']);
