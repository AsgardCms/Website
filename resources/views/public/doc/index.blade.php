@extends('public.layouts.master')

@section('title')Documentation | @parent @stop

@section('content')
<section id="main" class="container">
    <header>
        <h2>Documentation</h2>
        <p>All your questions answered</p>
    </header>
    <div class="row box row-box">
        <div class="3u">
            @include('public.doc.partials.sidebar')
        </div>
        <div class="9u content">
            {!! $content !!}
        </div>
    </div>
</section>
@stop
