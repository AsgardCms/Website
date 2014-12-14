@extends('public.layouts.master')

@section('content')
<section id="main" class="container">
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
