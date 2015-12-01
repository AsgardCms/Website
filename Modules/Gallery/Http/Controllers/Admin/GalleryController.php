<?php namespace Modules\Gallery\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Repositories\GalleryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class GalleryController extends AdminBaseController
{
    /**
     * @var GalleryRepository
     */
    private $gallery;

    public function __construct(GalleryRepository $gallery)
    {
        parent::__construct();

        $this->gallery = $gallery;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = $this->gallery->all();

        return view('gallery::admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('gallery::admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->gallery->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('gallery::galleries.title.galleries')]));

        return redirect()->route('admin.gallery.gallery.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery::admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Gallery $gallery
     * @param  Request $request
     * @return Response
     */
    public function update(Gallery $gallery, Request $request)
    {
        $this->gallery->update($gallery, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('gallery::galleries.title.galleries')]));

        return redirect()->route('admin.gallery.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Gallery $gallery
     * @return Response
     */
    public function destroy(Gallery $gallery)
    {
        $this->gallery->destroy($gallery);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('gallery::galleries.title.galleries')]));

        return redirect()->route('admin.gallery.gallery.index');
    }
}
