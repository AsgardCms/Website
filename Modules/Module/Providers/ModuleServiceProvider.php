<?php namespace Modules\Module\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Module\Http\Middleware\GuardSubmittedModules;

class ModuleServiceProvider extends ServiceProvider
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

    public function boot()
    {
        $this->app['router']->middleware('guard.submitted', GuardSubmittedModules::class);
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
            'Modules\Module\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Module\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Module\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Module\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Module\Repositories\ModuleRepository',
            function () {
                $repository = new \Modules\Module\Repositories\Eloquent\EloquentModuleRepository(new \Modules\Module\Entities\Module());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Module\Repositories\Cache\CacheModuleDecorator($repository);
            }
        );
// add bindings


    }
}
