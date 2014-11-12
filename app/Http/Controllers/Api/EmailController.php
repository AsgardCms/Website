<?php namespace Asguard\Http\Controllers\Api;

use Asguard\Entries\Repositories\EntryRepository;
use Asguard\Http\Controllers\Controller;
use Asguard\Http\Requests\SubscribeRequest;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{
    /**
     * @var EntryRepository
     */
    private $entry;

    public function __construct(EntryRepository $entry)
    {
        $this->entry = $entry;
    }

    public function subscribe(SubscribeRequest $request)
    {
        $this->entry->subscribe($request->email);

        return Response::json('Thank you! You have successfully applied for beta access.');
    }
}
