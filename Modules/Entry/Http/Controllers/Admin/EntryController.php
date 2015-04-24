<?php namespace Modules\Entry\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Entry\Entities\Entry;
use Modules\Entry\Repositories\EntryRepository;

class EntryController extends AdminBaseController
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = $this->entry->all();

        return view('entry::admin.entries.index', compact('entries'));
    }

    /**
     * @param $entry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function invite(Entry $entry)
    {
        $this->entry->invite($entry);

        return redirect()->route('admin.entry.entry.index')->with('success', "Invite sent to {$entry->email}.");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function batchInvite(Request $request)
    {
        $entries = $this->entry->notAccepted($request->get('amount', 50));

        foreach ($entries as $entry) {
            $this->entry->invite($entry);
        }

        return redirect()->route('admin.entry.entry.index')->with('success', 'Invites sent.');
    }

}
