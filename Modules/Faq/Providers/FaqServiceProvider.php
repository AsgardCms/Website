<?php namespace Modules\Faq\Providers;

use Illuminate\Support\ServiceProvider;

class FaqServiceProvider extends ServiceProvider
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
            'Modules\Faq\Repositories\FaqRepository',
            function () {
                $repository = new \Modules\Faq\Repositories\Eloquent\EloquentFaqRepository(new \Modules\Faq\Entities\Faq());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Faq\Repositories\Cache\CacheFaqDecorator($repository);
            }
        );
// add bindings
    }
}
