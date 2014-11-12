<?php namespace Asguard\Entries;

use Asguard\Entries\Entities\Entry;
use Asguard\Entries\Repositories\Eloquent\EloquentEntryRepository;
use Illuminate\Support\ServiceProvider;

class EntryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function () {
            $this->registerBindings();
        });
    }

    private function registerBindings()
    {
        $this->app->bind('Asguard\Entries\Repositories\EntryRepository', function() {
            return new EloquentEntryRepository(new Entry);
        });
    }
}
