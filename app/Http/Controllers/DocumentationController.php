<?php namespace Asgard\Http\Controllers;

use Asgard\Documentation\Repositories\DocumentationRepository;

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
        $toc = $this->documentation->toc();
        dd('toc view', $toc);
    }
}
