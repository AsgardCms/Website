<?php namespace Modules\Entry\Events\Handlers;

use Modules\Entry\Events\EntryAppliedToBeta;

class SubscribeEntryToMailchimp
{
    public function __construct()
    {
        $this->mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));
    }

    public function handle(EntryAppliedToBeta $event)
    {
        $this->mailchimp->lists->subscribe('e9db3e866f', ['email' => $event->entry->email]);
    }
}
