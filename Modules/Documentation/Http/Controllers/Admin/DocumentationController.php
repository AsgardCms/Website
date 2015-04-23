<?php namespace Modules\Documentation\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DocumentationController extends AdminBaseController
{
    public function index()
    {
        return view('documentation::admin.index');
    }
}
