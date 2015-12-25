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

    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allForUser.{$userId}", $this->cacheTime,
                function () use ($userId) {
                    return $this->repository->allForUser($userId);
                }
            );
    }
}
