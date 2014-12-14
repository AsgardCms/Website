<?php namespace Asgard\Documentation\Repositories\Git;

use Asgard\Documentation\Repositories\DocumentationRepository;
use Asgard\Documentation\Traits\CacheTrait;
use Illuminate\Filesystem\Filesystem;
use Michelf\MarkdownExtra;
use PHPGit\Git;

class GitDocumentationRepository implements DocumentationRepository
{
    use CacheTrait;
    /**
     * @var Filesystem
     */
    private $finder;

    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
        $this->git = new Git;

        if (!$this->finder->exists($this->getDocumentationPath())) {
            $this->git->clone('https://github.com/AsgardCms/Documentation.git');
        }
    }

    public function getPage($page)
    {
        $pageFile = $this->getDocumentationPath() . "/$page.md";

        return $this->cached(
            "doc_page_{$pageFile}_content",
            MarkdownExtra::defaultTransform($this->finder->get($pageFile))
        );
    }

    /**
     * Return the documentation path
     * @return string
     */
    private function getDocumentationPath()
    {
        return public_path() . '/Documentation';
    }
}
