<?php namespace Modules\Entry\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SubscribeToMailchimp implements SelfHandling, ShouldBeQueued
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var \Mailchimp
     */
    protected $mailchimp;
    /**
     * @var
     */
    private $email;

    /**
     * Create a new command instance.
     */
    public function __construct($email)
    {
        $this->mailchimp = new \Mailchimp(env('MAILCHIMP_KEY'));
        $this->email = $email;
    }

    /**
     * Execute the command.
     * @return void
     */
    public function handle()
    {
        $this->mailchimp->lists->subscribe('e9db3e866f', ['email' => $this->email]);
    }
}
