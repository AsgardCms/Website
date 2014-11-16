<?php namespace Asguard\Http\Controllers;

class FrontController extends Controller
{
    public function getInstallPage()
    {
        return view('public.install');
    }

    public function getFaq()
    {
        return view('public.faq');
    }
}
