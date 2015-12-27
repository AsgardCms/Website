<?php namespace Modules\Module\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Media\Repositories\FileRepository;
use Modules\Module\Entities\Module;
use Modules\Module\Http\Requests\CreateModuleRequest;
use Modules\Module\Http\Requests\UpdateModuleRequest;
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

        return view('module::account.modules.index', compact('modules'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('module::account.modules.create', compact('categories'));
    }

    public function store(CreateModuleRequest $request)
    {
        $module = $this->moduleRepository->create($request->all());

        return redirect()->route('account.modules.createGallery', $module->id);
    }

    public function createGallery(Module $module, FileRepository $fileRepository)
    {
        $images = $fileRepository->findMultipleFilesByZoneForEntity('module_gallery', $module);

        return view('module::account.modules.createGallery', compact('module', 'images'));
    }

    public function edit(Module $module)
    {
        $categories = $this->categoryRepository->all();

        return view('module::account.modules.edit', compact('module', 'categories'));
    }

    public function update(Module $module, UpdateModuleRequest $request)
    {
        $this->moduleRepository->update($module, $request->all());

        return redirect()->route('account.modules.createGallery', $module->id);
    }

    public function submit(Module $module)
    {
        if ($module->images->count() < 3) {
            return redirect()->back()->withError('You need to add at least 3 images');
        }
        $this->moduleRepository->submitForApproval($module);

        return redirect()->route('account.modules.thankYou', $module->id);
    }

    public function thankYou(Module $module)
    {
        return view('module::account.modules.thank-you');
    }
}
