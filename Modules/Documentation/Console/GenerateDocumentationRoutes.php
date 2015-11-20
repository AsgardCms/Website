<?php namespace Modules\Documentation\Console;

use Illuminate\Console\Command;
use Modules\Documentation\Services\DocumentationRoutesGenerator;

class GenerateDocumentationRoutes extends Command
{
    protected $name = 'docs:write-routes';
    protected $description = 'Write the documentation routes';
    /**
     * @var DocumentationRoutesGenerator
     */
    private $generator;

    public function __construct(DocumentationRoutesGenerator $generator)
    {
        parent::__construct();
        $this->generator = $generator;
    }

    public function fire()
    {
        $this->comment('Writing routes...');

        $this->generator->generate();

        $this->info('Routes written');
    }
}
