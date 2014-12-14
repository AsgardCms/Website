@extends('public.layouts.master')

@section('content')
<section id="main" class="container">
    <div class="row box row-box">
        <div class="3u">
            <ul class="side-menu">
                <li class="header">
                    <i class="fa fa-home"></i>
                    Getting Started
                </li>
                <li class="{{ Request::is('*/getting-started/installation') ? 'active' : ''}}">
                    <a href="{{ route('doc.show', ['getting-started/installation']) }}">Installation</a>
                </li>
                <li>
                    <a href="#test">Install</a>
                </li>
                <li class="header">
                    <i class="fa fa-bolt"></i>
                    Core Module
                </li>
                <li class="">
                    <a href="#test">Configuration</a>
                </li>
                <li>
                    <a href="#test">Navigation</a>
                </li>
                <li>
                    <a href="#test">Permissions</a>
                </li>
                <li>
                    <a href="#test">Repositories</a>
                </li>
                <li class="header">
                    <i class="fa fa-file-image-o"></i>
                    Media Module
                </li>
                <li>
                    <a href="#test">Thumbnails</a>
                </li>
                <li>
                    <a href="#test">Getting a thumbnail</a>
                </li>
                <li>
                    <a href="#test">Refreshing thumbnails</a>
                </li>
                <li class="header">
                    <i class="fa fa-cogs"></i>
                    Setting Module
                </li>
                <li>
                    <a href="#test">Adding settings</a>
                </li>
                <li>
                    <a href="#test">Available fields</a>
                </li>
                <li>
                    <a href="#test">Custom fields</a>
                </li>
                <li>
                    <a href="#test">Reading settings</a>
                </li>
                <li>
                    <a href="#test">Repositories</a>
                </li>
                <li class="header">
                    <i class="fa fa-picture-o"></i>
                    Themes
                </li>
                <li>
                    <a href="#test">Index</a>
                </li>
            </ul>
        </div>
        <div class="9u">
            {!! $content !!}
        </div>
    </div>
</section>
@stop
