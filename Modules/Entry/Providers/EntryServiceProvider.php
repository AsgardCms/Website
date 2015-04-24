<?php namespace Modules\Entry\Providers;

use Illuminate\Support\ServiceProvider;

class EntryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Entry\Repositories\EntryRepository',
            function () {
                $repository = new \Modules\Entry\Repositories\Eloquent\EloquentEntryRepository(new \Modules\Entry\Entities\Entry());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Entry\Repositories\Cache\CacheEntryDecorator($repository);
            }
        );
// add bindings
    }
}
