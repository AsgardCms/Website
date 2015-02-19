<?php namespace Asgard\Http\Controllers;

use Asgard\Activation;
use Asgard\Entries\Repositories\EntryRepository;
use Asgard\Http\Requests\GithubUsernameRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Asgard\Services\GithubService;

class EmailController extends Controller
{
    private $hashKey = '10b185ca-2a02-4fb8-bfa8-2861c254ee92';
    /**
     * @var EntryRepository
     */
    private $entry;
    /**
     * @var GithubService
     */
    private $githubService;

    public function __construct(EntryRepository $entry, GithubService $githubService)
    {
        $this->entry = $entry;
        $this->githubService = $githubService;
    }

    public function index()
    {
        $entries = $this->entry->allNotAccepted();
        foreach ($entries as $entry) {
            $token = $this->createNewToken($entry->email);

            Mail::queue('emails.finish', compact('token'), function($message) use ($entry)
            {
                $message->to($entry->email, $entry->email)->subject('AsgardCms: final step required');
            });
            $entry->accepted = 1;
            $entry->save();

            $this->createNewActivationForEntry($entry, $token);
        }

        dd('index view');
    }

    public function validateInvite($token)
    {
        return view('public.invites.validate', compact('token'));
    }

    public function addToOrganisation($token, GithubUsernameRequest $request)
    {
        $entry = $this->entry->findByEmail($request->get('email'));

        if (! $entry) {
            return Redirect::back()->withInput()->with('error', 'No Entry found with this email.');
        }
        if (! $this->isValidEntry($token, $entry)) {
            return Redirect::back()->withInput()->with('error', 'Not a valid submission.');
        }

        $this->githubService->addTeamMember($request->get('username'));
        $this->markActivationAsCompleted($token, $entry);
        $this->sendConfirmationEmail($entry);

        return Redirect::back()->with('success', 'You\'have been invited to the AsgardCms Github Organisation.');
    }

    private function createNewToken($email)
    {
        $value = str_shuffle(sha1($email.spl_object_hash($this).microtime(true)));

        return hash_hmac('sha1', $value, $this->hashKey);
    }

    /**
     * @param $entry
     * @param $token
     */
    private function createNewActivationForEntry($entry, $token)
    {
        $activation = new Activation();
        $activation->code = $token;
        $activation->entry_id = $entry->id;
        $activation->completed = 0;
        $activation->save();
    }

    /**
     * Check if it s a valid entry based on the token and entry
     * @param $token
     * @param $entry
     * @return bool
     */
    private function isValidEntry($token, $entry)
    {
        $activation = Activation::where('code', $token)->whereEntryId($entry->id)->first();
        if (! $activation) {
            return false;
        }

        return true;
    }

    private function markActivationAsCompleted($token, $entry)
    {
        $activation = Activation::where('code', $token)->whereEntryId($entry->id)->first();
        $activation->completed = 1;
        $activation->save();
    }

    private function sendConfirmationEmail($entry)
    {
        Mail::queue('emails.welcome', [], function($message) use ($entry)
        {
            $message->to($entry->email, $entry->email)->subject('You\'re in! Welcome to AsgardCms Beta!');
        });
    }
}
