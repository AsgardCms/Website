<?php namespace Asguard\Http\Controllers;

class FrontController
{
    public function getInstallPage()
    {
        return view('public.install');
    }
}
