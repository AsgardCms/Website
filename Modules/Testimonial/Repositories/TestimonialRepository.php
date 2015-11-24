<?php namespace Modules\Testimonial\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface TestimonialRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function randomTestimonials();
}
