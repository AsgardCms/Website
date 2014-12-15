<?php namespace Asgard\Console\Commands;

use Illuminate\Console\Command;
use PHPGit\Git;

class UpdateDocumentationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'docs:update';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the documentation';
    /**
     * @var Git
     */
    protected $git;

    public function __construct()
    {
        parent::__construct();
        $this->git = new Git;
    }

    public function fire()
    {
        $this->comment('Updating documentation...');

        $this->git->setRepository(public_path() . '/Documentation');
        $this->git->pull('origin', 'master');

        $this->info('Documentation updated!');
    }
}
