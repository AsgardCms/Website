<?php namespace Modules\Testimonial\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Testimonial\Repositories\TestimonialRepository;

class CacheTestimonialDecorator extends BaseCacheDecorator implements TestimonialRepository
{
    public function __construct(TestimonialRepository $testimonial)
    {
        parent::__construct();
        $this->entityName = 'testimonials.testimonials';
        $this->repository = $testimonial;
    }
}
