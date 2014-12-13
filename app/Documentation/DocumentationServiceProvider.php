<?php namespace Asgard\Documentation;

use Illuminate\Support\ServiceProvider;

class DocumentationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Asgard\Documentation\Repositories\DocumentationRepository',
            'Asgard\Documentation\Repositories\Git\GitDocumentationRepository'
        );
    }
}