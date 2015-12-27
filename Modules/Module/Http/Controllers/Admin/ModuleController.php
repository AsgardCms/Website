<?php namespace Modules\Module\Http\Controllers\Admin;

use FloatingPoint\Stylist\Facades\ThemeFacade as Theme;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Media\Image\Imagy;
use Modules\Media\Repositories\FileRepository;
use Modules\Module\Entities\Module;
use Modules\Module\Repositories\ModuleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use PhpParser\Node\Expr\BinaryOp\Mod;

class ModuleController extends AdminBaseController
{
    /**
     * @var ModuleRepository
     */
    private $module;

    public function __construct(ModuleRepository $module)
    {
        parent::__construct();

        $this->module = $module;
        $this->requireAssets();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $modules = $this->module->all();

        return view('module::admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('module::admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->module->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('module::modules.title.modules')]));

        return redirect()->route('admin.module.module.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Module $module
     * @return Response
     */
    public function edit(Module $module)
    {
        return view('module::admin.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Module $module
     * @param  Request $request
     * @return Response
     */
    public function update(Module $module, Request $request)
    {
        $this->module->update($module, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('module::modules.title.modules')]));

        return redirect()->route('admin.module.module.index');
    }

    public function view(Module $module)
    {
        return view('module::admin.modules.view', compact('module'));
    }

    public function reject(Module $module)
    {
        $module->reject();

        return redirect()->route('admin.module.module.index')->withSuccess('Module rejected');
    }

    public function publish(Module $module)
    {
        $module->publish();

        return redirect()->route('admin.module.module.index')->withSuccess('Module published');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Module $module
     * @return Response
     */
    public function destroy(Module $module, FileRepository $fileRepository, Imagy $imagy)
    {
        if ($module->images->count() > 0) {
            foreach ($module->images as $image) {
                \DB::table('media__imageables')->whereFileId($image->id)->delete();
                $file = $fileRepository->find($image->id);
                $imagy->deleteAllFor($file);
                $fileRepository->destroy($file);
            }
        }
        $this->module->destroy($module);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('module::modules.title.modules')]));

        return redirect()->route('admin.module.module.index');
    }

    private function requireAssets()
    {
        $this->assetManager->addAsset('simplemde.css', Theme::url('vendor/simplemde/dist/simplemde.min.css'));
        $this->assetManager->addAsset('simplemde.js', Theme::url('vendor/simplemde/dist/simplemde.min.js'));
        $this->assetPipeline->requireJs('simplemde.js');
        $this->assetPipeline->requireCss('simplemde.css');
    }
}
