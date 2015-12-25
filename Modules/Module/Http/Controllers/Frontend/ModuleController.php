<?php namespace Modules\Module\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Module\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    /**
     * @var ModuleRepository
     */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    public function index()
    {
        return view('module::public.modules.index');
    }
}
