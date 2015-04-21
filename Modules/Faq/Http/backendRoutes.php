<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/faq'], function (Router $router) {
        $router->bind('questions', function ($id) {
            return app('Modules\Faq\Repositories\QuestionRepository')->find($id);
        });
        $router->resource('questions', 'QuestionController', ['except' => ['show'], 'names' => [
            'index' => 'admin.faq.question.index',
            'create' => 'admin.faq.question.create',
            'store' => 'admin.faq.question.store',
            'edit' => 'admin.faq.question.edit',
            'update' => 'admin.faq.question.update',
            'destroy' => 'admin.faq.question.destroy',
        ]]);
        $router->bind('answers', function ($id) {
            return app('Modules\Faq\Repositories\AnswerRepository')->find($id);
        });
        $router->resource('answers', 'AnswerController', ['except' => ['show'], 'names' => [
            'index' => 'admin.faq.answer.index',
            'create' => 'admin.faq.answer.create',
            'store' => 'admin.faq.answer.store',
            'edit' => 'admin.faq.answer.edit',
            'update' => 'admin.faq.answer.update',
            'destroy' => 'admin.faq.answer.destroy',
        ]]);
// append


});
