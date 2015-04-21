<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/faq'], function (Router $router) {
        $router->bind('faqs', function ($id) {
            return app('Modules\Faq\Repositories\FaqRepository')->find($id);
        });
        $router->resource('faqs', 'FaqController', ['except' => ['show'], 'names' => [
            'index' => 'admin.faq.faq.index',
            'create' => 'admin.faq.faq.create',
            'store' => 'admin.faq.faq.store',
            'edit' => 'admin.faq.faq.edit',
            'update' => 'admin.faq.faq.update',
            'destroy' => 'admin.faq.faq.destroy',
        ]]);
// append

});
