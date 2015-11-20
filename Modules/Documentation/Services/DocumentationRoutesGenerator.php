<?php namespace Modules\Documentation\Services;

use Illuminate\Contracts\View\Factory;
use Illuminate\Filesystem\Filesystem;
use Modules\Documentation\Repositories\DocumentationRepository;

class DocumentationRoutesGenerator
{
    /**
     * @var DocumentationRepository
     */
    private $documentation;
    /**
     * @var Factory
     */
    private $viewFactory;
    /**
     * @var Filesystem
     */
    private $finder;

    public function __construct(DocumentationRepository $documentation, Factory $viewFactory, Filesystem $finder)
    {
        $this->documentation = $documentation;
        $this->viewFactory = $viewFactory;
        $this->finder = $finder;
    }

    public function generate()
    {
        $files = $this->documentation->getAllFiles();
        $view = $this->viewFactory->make('documentation::route_templates.routes', compact('files'));

        $filePath = storage_path() . "/routes/documentation_routes.php";
        $fileContents = "<?php\n\n" . $view->render();

        $this->finder->put($filePath, $fileContents);
    }
}
