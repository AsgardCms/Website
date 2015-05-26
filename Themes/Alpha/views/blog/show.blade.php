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

                <footer>
                    <?php if ($previous = $post->present()->previous): ?>
                        <a href="{{ route(locale() . '.blog.slug', [$previous->slug]) }}" class="pull-left"><i class="fa fa-angle-left"></i> Previous post</a>
                    <?php endif; ?>
                    <?php if ($next = $post->present()->next): ?>
                        <a href="{{ route(locale() . '.blog.slug', [$next->slug]) }}" class="pull-right">Next post <i class="fa fa-angle-right"></i></a>
                    <?php endif; ?>
                </footer>
            </div>
        </div>
    </section>
@stop
