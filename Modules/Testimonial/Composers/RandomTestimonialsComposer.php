<?php namespace Modules\Testimonial\Composers;

use Illuminate\Contracts\View\View;
use Modules\Testimonial\Repositories\TestimonialRepository;

class RandomTestimonialsComposer
{
    /**
     * @var TestimonialRepository
     */
    private $testimonials;

    public function __construct(TestimonialRepository $testimonials)
    {
        $this->testimonials = $testimonials;
    }

    public function compose(View $view)
    {
        $view->with('randomTestimonials', $this->testimonials->randomTestimonials());
    }
}
