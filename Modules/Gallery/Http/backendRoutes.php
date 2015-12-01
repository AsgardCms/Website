<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/gallery'], function (Router $router) {
    $router->bind('galleries', function ($id) {
        return app('Modules\Gallery\Repositories\GalleryRepository')->find($id);
    });
    get('galleries', ['as' => 'admin.gallery.gallery.index', 'uses' => 'GalleryController@index']);
    get('galleries/create', ['as' => 'admin.gallery.gallery.create', 'uses' => 'GalleryController@create']);
    post('galleries', ['as' => 'admin.gallery.gallery.store', 'uses' => 'GalleryController@store']);
    get('galleries/{galleries}/edit', ['as' => 'admin.gallery.gallery.edit', 'uses' => 'GalleryController@edit']);
    put('galleries/{galleries}/edit', ['as' => 'admin.gallery.gallery.update', 'uses' => 'GalleryController@update']);
    delete('galleries/{galleries}', ['as' => 'admin.gallery.gallery.destroy', 'uses' => 'GalleryController@destroy']);
// append

});
