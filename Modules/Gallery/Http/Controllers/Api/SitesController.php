<?php namespace Modules\Gallery\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SitesController extends Controller
{
    public function create(Request $request)
    {
        dd($request->all(), 'asdasd');
    }
}
