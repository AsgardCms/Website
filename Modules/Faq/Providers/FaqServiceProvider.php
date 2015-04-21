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
            'Modules\Faq\Repositories\QuestionRepository',
            function () {
                $repository = new \Modules\Faq\Repositories\Eloquent\EloquentQuestionRepository(new \Modules\Faq\Entities\Question());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Faq\Repositories\Cache\CacheQuestionDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Faq\Repositories\AnswerRepository',
            function () {
                $repository = new \Modules\Faq\Repositories\Eloquent\EloquentAnswerRepository(new \Modules\Faq\Entities\Answer());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Faq\Repositories\Cache\CacheAnswerDecorator($repository);
            }
        );
// add bindings
    }
}
