<?php namespace Modules\Module\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Module\Entities\Module;

interface ModuleRepository extends BaseRepository
{
    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId);

    /**
     * Submit a module into the approval process
     * @param Module $module
     * @return bool
     */
    public function submitForApproval(Module $module);
}
