<?php namespace Asgard\Http\Controllers;

use Asgard\Documentation\Repositories\DocumentationRepository;
use Illuminate\Support\Facades\Redirect;

class DocumentationController extends Controller
{
    /**
     * @var DocumentationRepository
     */
    private $documentation;

    public function __construct(DocumentationRepository $documentation)
    {
        $this->documentation = $documentation;
    }

    public function index()
    {
        return Redirect::route('doc.show', 'getting-started/installation');
    }

    public function show($page)
    {
        $title = $this->documentation->getTitle($page);
        $content = $this->documentation->getContent($page);

        return view('public.doc.index', compact('content', 'title'));
    }
}
