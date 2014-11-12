<?php namespace Asguard\Entries\Repositories\Eloquent;

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
        // TODO: Implement subscribe() method.
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->entry->all();
    }
}
