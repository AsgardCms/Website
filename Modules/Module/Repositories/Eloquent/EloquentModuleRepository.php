<?php namespace Modules\Module\Repositories\Eloquent;

use Modules\Module\Entities\Module;
use Modules\Module\Events\ModuleWasSubmittedForApproval;
use Modules\Module\Repositories\ModuleRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentModuleRepository extends EloquentBaseRepository implements ModuleRepository
{
    /**
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allForUser($userId)
    {
        return $this->model->whereUserId($userId)->get();
    }

    public function create($data)
    {
        $data['slug'] = str_slug($data['vendor']) . '_' . str_slug($data['name']);

        return $this->model->create($data);
    }

    /**
     * Submit a module into the approval process
     * @param Module $module
     * @return bool
     */
    public function submitForApproval(Module $module)
    {
        $model = $module->submitForApproval();

        event(new ModuleWasSubmittedForApproval($module));

        return $model;
    }
}
