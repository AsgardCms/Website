<?php namespace Modules\Documentation\Console;

use Illuminate\Console\Command;
use Modules\Documentation\Services\DocumentationRoutesGenerator;
use PHPGit\Git;

class UpdateDocumentationCommand extends Command
{
    protected $name = 'docs:update';
    protected $description = 'Update the documentation';
    /**
     * @var Git
     */
    protected $git;
    /**
     * @var DocumentationRoutesGenerator
     */
    private $generator;

    public function __construct(DocumentationRoutesGenerator $generator)
    {
        parent::__construct();
        $this->git = new Git;
        $this->generator = $generator;
    }

    public function fire()
    {
        $this->comment('Updating documentation...');

        $this->git->setRepository(public_path() . '/Documentation');
        $this->git->pull('origin', 'master');
        $this->generator->generate();

        $this->call('cache:clear');

        $this->info('Documentation updated!');
    }
}
