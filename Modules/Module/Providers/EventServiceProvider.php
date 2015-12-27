<?php namespace Modules\Module\Providers;

use Modules\Module\Events\Handlers\NotifyAdminForNewModule;
use Modules\Module\Events\Handlers\SendThankYouEmailToAuthor;
use Modules\Module\Events\ModuleWasSubmittedForApproval;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        ModuleWasSubmittedForApproval::class => [
            SendThankYouEmailToAuthor::class,
            NotifyAdminForNewModule::class,
        ],
    ];
}
