@extends('public.layouts.master')

@section('content')
<section id="main" class="container">
    <div class="row box row-box">
        <div class="3u">
            <ul class="side-menu">
                <li class="header">
                    <i class="fa fa-bolt"></i>
                    Core
                </li>
                <li class="{{ Request::is('*/getting-started/installation') ? 'active' : ''}}">
                    <a href="{{ route('doc.show', ['getting-started/installation']) }}">Installation</a>
                </li>
                <li>
                    <a href="#test">Install</a>
                </li>
                <li class="header">
                    <i class="fa fa-bolt"></i>
                    Core
                </li>
                <li class="active">
                    <a href="#test">Install</a>
                </li>
                <li>
                    <a href="#test">Install</a>
                </li>
            </ul>
        </div>
        <div class="9u">
            {!! $content !!}
        </div>
    </div>
</section>
@stop
