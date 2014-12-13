<?php namespace Asgard\Entries;

use Asgard\Entries\Entities\Entry;
use Asgard\Entries\Repositories\Eloquent\EloquentEntryRepository;
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
        $this->app->bind('Asgard\Entries\Repositories\EntryRepository', function() {
            return new EloquentEntryRepository(new Entry);
        });
    }
}
