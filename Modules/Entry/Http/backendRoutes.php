<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->bind('email', function ($email) {
    return app('Modules\Entry\Repositories\EntryRepository')->findByEmail($email);
});
$router->group(['prefix' =>'/entry'], function (Router $router) {
    $router->get('entries', [
        'as' => 'admin.entry.entry.index',
        'uses' => 'EntryController@index'
    ]);
    $router->get('invite/{email}', [
        'as' => 'admin.entry.entry.invite',
        'uses' => 'EntryController@invite'
    ]);
    $router->post('batch-invite', [
        'as' => 'admin.entry.entry.batch-invite',
        'uses' => 'EntryController@batchInvite'
    ]);
});
