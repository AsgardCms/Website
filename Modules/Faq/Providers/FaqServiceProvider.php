<?php namespace Modules\Faq\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Repositories\Cache\CacheFaqDecorator;
use Modules\Faq\Repositories\Eloquent\EloquentFaqRepository;

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
                $repository = new EloquentFaqRepository(new Faq());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheFaqDecorator($repository);
            }
        );
    }
}
