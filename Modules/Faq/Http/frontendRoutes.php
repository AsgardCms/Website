<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('faq', [
    'as' => 'faq',
    'uses' => 'Frontend\FaqController@index'
]);
