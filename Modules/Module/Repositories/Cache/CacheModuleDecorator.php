<?php namespace Modules\Module\Repositories\Cache;

use Modules\Module\Entities\Module;
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

    /**
     * Submit a module into the approval process
     * @param Module $module
     * @return bool
     */
    public function submitForApproval(Module $module)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.submitForApproval.{$module->id}", $this->cacheTime,
                function () use ($module) {
                    return $this->repository->submitForApproval($module);
                }
            );
    }
}
