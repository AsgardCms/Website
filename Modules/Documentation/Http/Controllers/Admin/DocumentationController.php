<?php namespace Modules\Documentation\Http\Controllers\Admin;

use Illuminate\Support\Facades\Artisan;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DocumentationController extends AdminBaseController
{
    public function index()
    {
        return view('documentation::admin.index');
    }

    public function refresh()
    {
        Artisan::call('docs:update');
    }
}
