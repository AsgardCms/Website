<?php namespace Modules\Gallery\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Gallery\Repositories\GalleryRepository;
use Modules\Media\Repositories\FileRepository;

class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    private $gallery;

    public function __construct(GalleryRepository $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index()
    {
        $projects = $this->gallery->all();

        return view('gallery::public.index', compact('projects'));
    }
}
