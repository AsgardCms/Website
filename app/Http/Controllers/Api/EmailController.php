<?php namespace Asguard\Http\Controllers\Api;

use Asguard\Entries\Repositories\EntryRepository;
use Asguard\Http\Controllers\Controller;

class EmailController extends Controller
{
    /**
     * @var EntryRepository
     */
    private $entry;

    public function __construct(EntryRepository $entry)
    {
        parent::__construct();

        $this->entry = $entry;
    }

    public function subscribe()
    {
        dd('called');
    }
}
