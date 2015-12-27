<?php namespace Modules\Module\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Modules\Module\Events\ModuleWasSubmittedForApproval;

class SendThankYouEmailToAuthor
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(ModuleWasSubmittedForApproval $event)
    {
        $module = $event->module;

        $this->mailer->queue('module::emails.thank-you', compact('module'), function (Message $message) use ($module) {
            $message->subject('AsgardCms: Module submitted');
            $message->to($module->user->email);
        });
    }
}
