<?php namespace Modules\Module\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Module\Http\Requests\CreateModuleRequest;
use Modules\Module\Repositories\CategoryRepository;
use Modules\Module\Repositories\ModuleRepository;

class ModuleController extends BasePublicController
{
    /**
     * @var ModuleRepository
     */
    private $moduleRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ModuleRepository $moduleRepository, CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->moduleRepository = $moduleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $modules = $this->moduleRepository->allForUser($this->auth->check()->id);

        return view('module::public.modules.index', compact('modules'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('module::public.modules.create', compact('categories'));
    }

    public function store(CreateModuleRequest $request)
    {
        dd($request->all());
    }
}
