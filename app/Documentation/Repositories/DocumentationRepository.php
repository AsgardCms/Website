<?php namespace Asgard\Documentation\Repositories;

interface DocumentationRepository
{
    public function toc();
    /**
     * Get the given page in the documentation
     * @param string $page
     * @return string
     */
    public function getPage($page);
}
