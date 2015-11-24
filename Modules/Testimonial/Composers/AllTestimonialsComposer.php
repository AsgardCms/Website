<?php namespace Modules\Testimonial\Composers;

use Illuminate\Contracts\View\View;
use Modules\Testimonial\Repositories\TestimonialRepository;

class AllTestimonialsComposer
{
    /**
     * @var TestimonialRepository
     */
    private $testimonial;

    public function __construct(TestimonialRepository $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function compose(View $view)
    {
        $view->with('testimonials', $this->testimonial->all());
    }
}
