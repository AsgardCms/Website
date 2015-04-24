<?php namespace Modules\Entry\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Entry\Entities\Entry;
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

    /**
     * @param $email
     * @return mixed
     */
    public function subscribe($email)
    {
        $entry = new Entry;
        $entry->email = $email;
        $entry->save();

        return $entry;
    }

    public function notAccepted($limit = 50)
    {
        return $this->entry->where('accepted', '!=', 1)->orderBy('created_at')->take($limit)->get();
    }

    public function findByEmail($email)
    {
        return $this->entry->whereEmail($email)->first();
    }
}
