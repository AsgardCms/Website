<?php namespace Modules\Module\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Modules\Module\Events\ModuleWasSubmittedForApproval;

class NotifyAdminForNewModule
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

        $this->mailer->send('module::emails.module-submitted-notification', compact('module'), function (Message $message) use ($module) {
            $message->subject('AsgardCms: New module submitted');
            $message->to('n.widart@gmail.com');
            $message->replyTo($module->user->email);
        });
    }
}
