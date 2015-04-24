<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/entry'], function (Router $router) {
        $router->bind('entries', function ($id) {
            return app('Modules\Entry\Repositories\EntryRepository')->find($id);
        });
        $router->resource('entries', 'EntryController', ['except' => ['show'], 'names' => [
            'index' => 'admin.entry.entry.index',
            'create' => 'admin.entry.entry.create',
            'store' => 'admin.entry.entry.store',
            'edit' => 'admin.entry.entry.edit',
            'update' => 'admin.entry.entry.update',
            'destroy' => 'admin.entry.entry.destroy',
        ]]);
});
