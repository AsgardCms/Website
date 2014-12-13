<?php namespace Asgard\Documentation\Repositories\Git;

use Asgard\Documentation\Repositories\DocumentationRepository;
use Illuminate\Filesystem\Filesystem;
use PHPGit\Git;

class GitDocumentationRepository implements DocumentationRepository
{
    /**
     * @var Filesystem
     */
    private $finder;

    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
        $this->git = new Git;
    }

    public function toc()
    {
        $this->git->clone('https://github.com/AsgardCms/Documentation.git');
        return 'toc';
    }
}
