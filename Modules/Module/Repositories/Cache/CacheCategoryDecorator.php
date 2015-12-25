<?php namespace Modules\Module\Repositories\Cache;

use Modules\Module\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'module.categories';
        $this->repository = $category;
    }
}
