<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/module'], function (Router $router) {
    $router->bind('categories', function ($id) {
        return app(\Modules\Module\Repositories\CategoryRepository::class)->find($id);
    });
    get('categories', ['as' => 'admin.module.category.index', 'uses' => 'CategoryController@index']);
    get('categories/create', ['as' => 'admin.module.category.create', 'uses' => 'CategoryController@create']);
    post('categories', ['as' => 'admin.module.category.store', 'uses' => 'CategoryController@store']);
    get('categories/{categories}/edit', ['as' => 'admin.module.category.edit', 'uses' => 'CategoryController@edit']);
    put('categories/{categories}/edit', ['as' => 'admin.module.category.update', 'uses' => 'CategoryController@update']);
    delete('categories/{categories}', ['as' => 'admin.module.category.destroy', 'uses' => 'CategoryController@destroy']);
    $router->bind('modules', function ($id) {
        return app(\Modules\Module\Repositories\ModuleRepository::class)->find($id);
    });
    get('modules', ['as' => 'admin.module.module.index', 'uses' => 'ModuleController@index']);
    get('modules/create', ['as' => 'admin.module.module.create', 'uses' => 'ModuleController@create']);
    post('modules', ['as' => 'admin.module.module.store', 'uses' => 'ModuleController@store']);
    get('modules/{modules}/edit', ['as' => 'admin.module.module.edit', 'uses' => 'ModuleController@edit']);
    get('modules/{modules}/view', ['as' => 'admin.module.module.view', 'uses' => 'ModuleController@view']);
    get('modules/{modules}/reject', ['as' => 'admin.module.module.reject', 'uses' => 'ModuleController@reject']);
    get('modules/{modules}/publish', ['as' => 'admin.module.module.publish', 'uses' => 'ModuleController@publish']);
    put('modules/{modules}/edit', ['as' => 'admin.module.module.update', 'uses' => 'ModuleController@update']);
    delete('modules/{modules}', ['as' => 'admin.module.module.destroy', 'uses' => 'ModuleController@destroy']);
});
