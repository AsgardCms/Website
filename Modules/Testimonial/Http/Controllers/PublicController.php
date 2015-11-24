<?php namespace Modules\Testimonial\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Testimonial\Repositories\TestimonialRepository;

class PublicController extends BasePublicController
{
    /**
     * @var TestimonialRepository
     */
    private $testimonial;

    public function __construct(TestimonialRepository $testimonial)
    {
        parent::__construct();
        $this->testimonial = $testimonial;
    }

    public function index()
    {
        $testimonials = $this->testimonial->all();

        return view('testimonials', compact('testimonials'));
    }
}
