<?php namespace Modules\Profile\Http\Controllers\Frontend;

use Modules\Core\Contracts\Authentication;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Entry\Repositories\EntryRepository;

class ProfileController extends BasePublicController
{
    /**
     * @var Authentication
     */
    private $auth;
    /**
     * @var EntryRepository
     */
    private $entry;

    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth, EntryRepository $entry)
    {
        parent::__construct();
        $this->auth = $auth;
        $this->entry = $entry;
    }

    /**
     *
     */
    public function show()
    {
        $user = $this->auth->check();

        return view('profile::public.profile', compact('user'));
    }

    public function beta()
    {
        $user = $this->auth->check();
        $entry = $this->entry->findByEmail($user->email);

        return view('profile::public.beta-access', compact('user', 'entry'));
    }
}
