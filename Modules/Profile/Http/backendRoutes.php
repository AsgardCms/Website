<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/profile'], function (Router $router) {
        $router->bind('profiles', function ($id) {
            return app('Modules\Profile\Repositories\ProfileRepository')->find($id);
        });
        $router->resource('profiles', 'ProfileController', ['except' => ['show'], 'names' => [
            'index' => 'admin.profile.profile.index',
            'create' => 'admin.profile.profile.create',
            'store' => 'admin.profile.profile.store',
            'edit' => 'admin.profile.profile.edit',
            'update' => 'admin.profile.profile.update',
            'destroy' => 'admin.profile.profile.destroy',
        ]]);
// append

});
