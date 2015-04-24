<?php namespace Modules\Entry\Events;

use Modules\Entry\Entities\Entry;

class EntryWasInvited
{
    /**
     * @var Entry
     */
    public $entry;

    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }
}
