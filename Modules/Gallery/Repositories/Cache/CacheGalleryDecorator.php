<?php namespace Modules\Gallery\Repositories\Cache;

use Modules\Gallery\Repositories\GalleryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGalleryDecorator extends BaseCacheDecorator implements GalleryRepository
{
    public function __construct(GalleryRepository $gallery)
    {
        parent::__construct();
        $this->entityName = 'gallery.galleries';
        $this->repository = $gallery;
    }
}
