<?php namespace Modules\Module\Repositories\Cache;

use Modules\Module\Repositories\ModuleRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheModuleDecorator extends BaseCacheDecorator implements ModuleRepository
{
    public function __construct(ModuleRepository $module)
    {
        parent::__construct();
        $this->entityName = 'module.modules';
        $this->repository = $module;
    }
}
