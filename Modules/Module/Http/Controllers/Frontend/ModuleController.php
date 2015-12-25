<?php namespace Modules\Module\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Module\Repositories\ModuleRepository;

class ModuleController extends BasePublicController
{
    /**
     * @var ModuleRepository
     */
    private $moduleRepository;


    public function __construct(ModuleRepository $moduleRepository)
    {
        parent::__construct();
        $this->moduleRepository = $moduleRepository;
    }

    public function index()
    {
        $modules = $this->moduleRepository->allForUser($this->auth->check()->id);

        return view('module::public.modules.index', compact('modules'));
    }
}
