<?php namespace Modules\Entry\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Entry\Events\EntryAppliedToBeta;
use Modules\Entry\Http\Requests\SubscribeRequest;
use Modules\Entry\Repositories\EntryRepository;

class EntryController extends Controller
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
        $entry = $this->entry->subscribe($request->email);

        event(new EntryAppliedToBeta($entry));

        return Response::json('Thank you! You have successfully applied for beta access.');
    }
}
