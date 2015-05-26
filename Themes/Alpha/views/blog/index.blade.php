@extends('layouts.master')

@section('title')Blog | @parent @stop

@section('styles')
    <style>
        small {
            font-size: 0.4em;
        }
    </style>
@stop
@section('content')
    <section id="main" class="container">
        <header>
            <h2>Blog</h2>
        </header>
        <div class="row box row-box">
            <div class="3u 3u(2) 12u$(4)">
                <ul class="side-menu">
                    {{--<li>sa</li>--}}
                </ul>
            </div>
            <div class="9u 9u(2) 12u$(4) content">
                <?php foreach($posts as $post): ?>
                    <?php $url = route(LaravelLocalization::getCurrentLocale() . '.blog.slug', [$post->slug]); ?>
                    <h2>
                        <a href="{{ $url }}">{{ $post->title }}</a>
                        <small class="pull-right">{{ $post->created_at->format('d-m-Y') }}</small>
                    </h2>
                    <?php $readmore = "&nbsp; <a href='$url'>Read more</a>" ?>
                    {!! str_limit($post->content, 150, $readmore) !!}
                <?php endforeach; ?>
            </div>
        </div>
    </section>
@stop
