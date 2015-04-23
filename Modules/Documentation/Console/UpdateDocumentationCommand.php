<?php namespace Modules\Documentation\Console;

use Illuminate\Console\Command;
use PHPGit\Git;

class UpdateDocumentationCommand extends Command
{
    protected $name = 'docs:update';
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

        $this->call('cache:clear');

        $this->info('Documentation updated!');
    }
}
