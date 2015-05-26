@extends('layouts.master')

@section('title')Blog | @parent @stop

@section('content')
    <section id="main" class="container">
        <header>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->created_at->format('d-m-Y') }}</p>
        </header>
        <div class="row box row-box">
            <div class="3u 3u(2) 12u$(4)">
                <ul class="side-menu">
                    <li class="header">
                        <i class="fa fa-chevron-circle-left"></i>
                        <a href="{{ route(locale() . '.blog') }}">Back to index</a>
                    </li>
                </ul>
                @include('blog.partials.latest-posts')
            </div>
            <div class="9u 9u(2) 12u$(4) content">
                {!! $post->content !!}
            </div>
        </div>
    </section>
@stop
