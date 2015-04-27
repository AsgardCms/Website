<?php namespace Modules\Entry\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Mail;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Entry\Entities\Activation;
use Modules\Entry\Http\Requests\GithubUsernameRequest;
use Modules\Entry\Repositories\EntryRepository;
use Modules\Entry\Services\GithubService;

class EntryController extends BasePublicController
{
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
        parent::__construct();
        $this->entry = $entry;
        $this->githubService = $githubService;
    }

    public function subscribe($email)
    {
        dd('eok' , $email);
        $this->entry->subscribe($email);

        return redirect()->back();
    }

    public function validateInvite($token)
    {
        return view('entry::public.invites.validate', compact('token'));
    }

    public function addToOrganisation($token, GithubUsernameRequest $request)
    {
        $entry = $this->entry->findByEmail($request->get('email'));

        if (! $entry) {
            return redirect()->back()->withInput()->with('error', 'No Entry found with this email.');
        }
        if (! $this->isValidEntry($token, $entry)) {
            return redirect()->back()->withInput()->with('error', 'Not a valid submission.');
        }

        $this->githubService->addTeamMember($request->get('username'));
        $this->markActivationAsCompleted($token, $entry);
        $this->sendConfirmationEmail($entry);

        return redirect()->back()->with('success', 'You\'have been invited to the AsgardCms Github Organisation.');
    }

    /**
     * Check if it s a valid entry based on the token and entry
     * @param $token
     * @param $entry
     * @return bool
     */
    private function isValidEntry($token, $entry)
    {
        $activation = Activation::where('code', $token)->whereEntryId($entry->id)->where('completed', 0)->first();
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
        Mail::queue('entry::admin.emails.welcome', [], function($message) use ($entry)
        {
            $message->to($entry->email, $entry->email)->subject('You\'re in! Welcome to AsgardCms Beta!');
        });
    }
}
