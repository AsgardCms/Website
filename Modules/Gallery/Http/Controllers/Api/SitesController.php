<?php namespace Modules\Gallery\Http\Controllers\Api;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Routing\Controller;

class SitesController extends Controller
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $this->mailer->queue('emails.website-proposal', ['data' => $data], function (Message $message) use ($data) {
            $message->to('n.widart@gmail.com');
            $message->replyTo($data['email'], $data['name']);
            $message->subject('AsgardCms: New Website Proposal');
        });

        return response()->json('Thank you for submitting your website! We\'ll get back to your as soon as possible .');
    }
}
