@extends('layouts.master')

@section('title'){{ $title }} - Documentation | @parent @stop

@section('meta')
    <meta name="description" content="AsgardCms Documentation: {{ $title }} - {{ $subtitle }}" />
@stop

@section('content')
<section id="main" class="container">
    <header>
        <h2>{{ $title }}</h2>
        <p>{{ $subtitle }}</p>
    </header>
    <div class="row box row-box">
        <div class="3u 3u(2) 12u$(4)">
            @include('doc.partials.sidebar')
        </div>
        <div class="9u 9u(2) 12u$(4) content">
            {!! $content !!}
        </div>
    </div>
</section>
@stop
