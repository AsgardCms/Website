<?php namespace Modules\Documentation\Repositories\Git;

use Modules\Documentation\Repositories\DocumentationRepository;
use Illuminate\Cache\Repository;
use Illuminate\Filesystem\Filesystem;
use Kurenai\DocumentParser;
use Michelf\MarkdownExtra;
use PHPGit\Git;

class GitDocumentationRepository implements DocumentationRepository
{
    /**
     * @var DocumentParser
     */
    protected $parser;
    /**
     * @var Filesystem
     */
    private $finder;
    /**
     * @var Repository
     */
    private $cache;

    public function __construct(Filesystem $finder, Repository $cache)
    {
        $this->finder = $finder;
        $this->git = new Git;
        $this->parser = new DocumentParser;
        $this->cache = $cache;

        if ( ! $this->finder->exists($this->getDocumentationPath())) {
            $this->git->clone('https://github.com/AsgardCms/Documentation.git');
        }
    }

    /**
     * Return the documentation path
     *
     * @return string
     */
    private function getDocumentationPath()
    {
        return public_path() . '/Documentation';
    }

    public function getContent($page)
    {
        $pageFile = $this->getDocumentationPath() . "/$page.md";

        return $this->cache->remember("doc_page_{$pageFile}_content", 60, function() use($pageFile)
        {
            $data = $this->parser->parse($this->finder->get($pageFile));
            return MarkdownExtra::defaultTransform($data->getContent());
        });
    }

    public function toc()
    {
        $documentationPath = $this->getDocumentationPath();
        $files = $this->finder->allFiles($documentationPath);
        $directories = $this->finder->directories($documentationPath);

        $toc = [];
        foreach ($directories as $dir) {
            $directoryName = str_replace('-', ' ', basename($dir));
            $toc[$directoryName] = [];
        }

        foreach ($files as $file) {
            $cleanedModuleName = str_replace('-', ' ', $file->getRelativePath());
            if (isset($toc[$cleanedModuleName])) {
                $toc[$cleanedModuleName][] = [
                    'request' => $this->getRequestName($file),
                    'url' => route('doc.show', [$this->getRouteName($file)]),
                    'name' => $this->getFileName($file)
                ];
            }
        }

        return $toc;
    }

    /**
     * @param $file
     * @return mixed
     */
    private function getFileName($file)
    {
        $name = str_replace([$file->getRelativePath() . '/', '-', '.md'], ['', ' ', ''], $file->getRelativePathname());

        return ucwords($name);
    }

    private function getRequestName($file)
    {
        $requestName = strtolower($file->getRelativePathname());

        return '*/' . $this->removeExtension($requestName, '.md');
    }

    private function getRouteName($file)
    {
        $requestName = strtolower($file->getRelativePathname());

        return $this->removeExtension($requestName, '.md');
    }

    private function removeExtension($requestName, $extension)
    {
        return str_replace($extension, '', $requestName);
    }

    /**
     * Get the page title
     *
     * @param string $page
     * @return string
     */
    public function getTitle($page)
    {
        $pageFile = $this->getDocumentationPath() . "/$page.md";

        return $this->cache->remember("doc_page_{$pageFile}_title", 60, function() use($pageFile)
        {
            $data = $this->parser->parse($this->finder->get($pageFile));

            return $data->get('title');
        });
    }

    /**
     * Get the page sub title
     *
     * @param string $page
     * @return string
     */
    public function getSubTitle($page)
    {
        $pageFile = $this->getDocumentationPath() . "/$page.md";

        return $this->cache->remember("doc_page_{$pageFile}_sub-title", 60, function() use($pageFile)
        {
            $data = $this->parser->parse($this->finder->get($pageFile));

            return $data->get('subtitle');
        });
    }
}
