<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/testimonial'], function (Router $router) {
        $router->bind('testimonial', function ($id) {
            return app(\Modules\Testimonial\Repositories\TestimonialRepository::class)->find($id);
        });
        $router->resource('testimonial', 'TestimonialController', ['except' => ['show'], 'names' => [
            'index' => 'admin.testimonials.testimonial.index',
            'create' => 'admin.testimonials.testimonial.create',
            'store' => 'admin.testimonials.testimonial.store',
            'edit' => 'admin.testimonials.testimonial.edit',
            'update' => 'admin.testimonials.testimonial.update',
            'destroy' => 'admin.testimonials.testimonial.destroy',
        ]]);
});
