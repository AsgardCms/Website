<?php namespace Asguard\Entries\Repositories\Eloquent;

use Asguard\Entries\Entities\Entry;
use Asguard\Entries\Repositories\EntryRepository;
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
}
