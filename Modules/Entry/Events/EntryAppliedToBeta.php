<?php namespace Modules\Entry\Events;

use Modules\Entry\Entities\Entry;

class EntryAppliedToBeta
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
