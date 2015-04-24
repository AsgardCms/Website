<?php namespace Modules\Entry\Events\Handlers;

use Illuminate\Support\Facades\Mail;
use Modules\Entry\Events\EntryWasInvited;

class SendInviteFinalStepEmail
{
    public function handle(EntryWasInvited $event)
    {
        $entry = $event->entry;
        $token = $entry->activation->code;
        Mail::queue('entry::admin.emails.finish', compact('token'), function($message) use ($entry)
        {
            $message->to($entry->email, $entry->email)->subject('AsgardCms: final step required');
        });
    }
}
