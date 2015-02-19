<?php namespace Asgard\Entries\Repositories\Eloquent;

use Asgard\Entries\Entities\Entry;
use Asgard\Entries\Repositories\EntryRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentEntryRepository implements EntryRepository
{
    /**
     * @var Model
     */
    private $entry;

    public function __construct(Model $entry)
    {
        $this->entry = $entry;
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

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->entry->all();
    }

    public function allNotAccepted()
    {
        return $this->entry->where('accepted', '!=', 1)->orderBy('created_at')->take(50)->get();
    }

    public function findByEmail($email)
    {
        return $this->entry->whereEmail($email)->first();
    }
}
