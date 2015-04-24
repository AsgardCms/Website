<?php namespace Modules\Entry\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Entry\Repositories\EntryRepository;

class EloquentEntryRepository extends EloquentBaseRepository implements EntryRepository
{
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }
}
