<?php namespace Modules\Module\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface ModuleRepository extends BaseRepository
{
    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId);
}
