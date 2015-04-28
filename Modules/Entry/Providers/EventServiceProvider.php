<?php namespace Modules\Entry\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Modules\Entry\Events\EntryWasInvited' => [
            'Modules\Entry\Events\Handlers\SendInviteFinalStepEmail',
        ],
        'Modules\Entry\Events\EntryAppliedToBeta' => [
            'Modules\Entry\Events\Handlers\SubscribeEntryToMailchimp',
        ],
    ];
}
