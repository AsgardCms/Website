<?php namespace Modules\Module\Http\Controllers\Frontend;

use Modules\Core\Http\Controllers\BasePublicController;

class PublicModuleController extends BasePublicController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('module::public.index');
    }
}
