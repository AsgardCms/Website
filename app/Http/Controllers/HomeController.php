<?php namespace Asguard\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home');
    }
}
