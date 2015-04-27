<?php namespace Modules\Profile\Http\Controllers\Frontend;

use Modules\Core\Contracts\Authentication;
use Modules\Core\Http\Controllers\BasePublicController;

class ProfileController extends BasePublicController
{
    /**
     * @var Authentication
     */
    private $auth;

    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        parent::__construct();
        $this->auth = $auth;
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

        return view('profile::public.beta-access', compact('user'));
    }
}
