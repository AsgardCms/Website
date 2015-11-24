<?php namespace Modules\Testimonial\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Testimonial\Repositories\TestimonialRepository;

class EloquentTestimonialRepository extends EloquentBaseRepository implements TestimonialRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function randomTestimonials()
    {
        return $this->model->orderByRaw('RAND()')->take(3)->get();
    }
}
