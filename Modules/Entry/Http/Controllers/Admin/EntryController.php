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
        //$entries = $this->entry->all();

        return view('entry::admin.entries.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('entry::admin.entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->entry->create($request->all());

        Flash::success(trans('entry::entries.messages.entry created'));

        return redirect()->route('admin.entry.entry.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Entry $entry
     * @return Response
     */
    public function edit(Entry $entry)
    {
        return view('entry::admin.entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Entry $entry
     * @param  Request $request
     * @return Response
     */
    public function update(Entry $entry, Request $request)
    {
        $this->entry->update($entry, $request->all());

        Flash::success(trans('entry::entries.messages.entry updated'));

        return redirect()->route('admin.entry.entry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Entry $entry
     * @return Response
     */
    public function destroy(Entry $entry)
    {
        $this->entry->destroy($entry);

        Flash::success(trans('entry::entries.messages.entry deleted'));

        return redirect()->route('admin.entry.entry.index');
    }
}
