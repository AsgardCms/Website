<?php namespace Modules\Module\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Module\Entities\Module;
use Modules\Module\Repositories\ModuleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$modules = $this->module->all();

        return view('module::admin.modules.index', compact(''));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Module $module
     * @return Response
     */
    public function destroy(Module $module)
    {
        $this->module->destroy($module);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('module::modules.title.modules')]));

        return redirect()->route('admin.module.module.index');
    }
}
