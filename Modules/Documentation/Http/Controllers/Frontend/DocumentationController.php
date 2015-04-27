<?php namespace Modules\Documentation\Http\Controllers\Frontend;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\App;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Documentation\Repositories\DocumentationRepository;

class DocumentationController extends BasePublicController
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
        return redirect()->route('doc.show', 'getting-started/installation');
    }

    public function show($page)
    {
        try {
            $title = $this->documentation->getTitle($page);
        } catch (FileNotFoundException $e) {
            App::abort('404');
        }

        $subtitle = $this->documentation->getSubTitle($page);
        $content = $this->documentation->getContent($page);

        return view('doc.index', compact('content', 'title', 'subtitle'));
    }
}
