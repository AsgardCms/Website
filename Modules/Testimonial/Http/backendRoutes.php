<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' =>'/testimonials'], function (Router $router) {
        $router->bind('testimonials', function ($id) {
            return app('Modules\Testimonial\Repositories\TestimonialRepository')->find($id);
        });
        $router->resource('testimonials', 'TestimonialController', ['except' => ['show'], 'names' => [
            'index' => 'admin.testimonials.testimonial.index',
            'create' => 'admin.testimonials.testimonial.create',
            'store' => 'admin.testimonials.testimonial.store',
            'edit' => 'admin.testimonials.testimonial.edit',
            'update' => 'admin.testimonials.testimonial.update',
            'destroy' => 'admin.testimonials.testimonial.destroy',
        ]]);
// append

});
