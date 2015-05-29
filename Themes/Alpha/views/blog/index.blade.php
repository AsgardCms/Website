@extends('layouts.master')

@section('title')Blog | @parent @stop

@section('styles')
    <style>
        small {
            font-size: 0.4em;
        }
        article {
            border-bottom: 1px solid #d0d2d0;
            margin-bottom: 1em;
            padding-bottom: 1em;
        }
        article:last-child {
            border: none;
            margin-bottom: 0;
            padding-bottom: 0;
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
                @include('blog.partials.latest-posts')
            </div>
            <div class="9u 9u(2) 12u$(4) content">
                <?php if ($posts->count() > 0): ?>
                    <?php foreach($posts as $post): ?>
                        <article>
                            <?php $url = route(locale() . '.blog.slug', [$post->slug]); ?>
                            <h2>
                                <a href="{{ $url }}">{{ $post->title }}</a>
                                <small class="pull-right">{{ $post->created_at->format('d-m-Y') }}</small>
                            </h2>
                            <?php $readmore = "&nbsp; <a href='$url'>Read more</a>" ?>
                            {!! str_limit($post->content, 150, $readmore) !!}
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No posts available yet, stay tuned!</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
@stop
