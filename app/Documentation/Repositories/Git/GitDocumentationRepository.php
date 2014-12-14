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

    public function getPage($page)
    {
        $pageFile = $this->getDocumentationPath() . "/$page.md";

        return $this->cached(
            "doc_page_{$pageFile}_content",
            MarkdownExtra::defaultTransform($this->finder->get($pageFile))
        );
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
}
