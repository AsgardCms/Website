<!DOCTYPE HTML>
<html>
<head>
    <meta name="keywords" content="laravel, CMS, Modular, Multilingual" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:title" content="A modular multilingual Content Management System built with Laravel 5" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://asgardcms.com" />
    <meta property="og:description" content="Introducing a full-featured modular multilingual CMS built on top of the Laravel framework. Asgard CMS will kickstart all your future client applications." />
    <?php if (isset($page)): ?>
    <meta name="description" content="{!! $page->meta_description !!}" />
    <title>{!! $page->meta_title !!}</title>
    <?php else: ?>
    @section('meta')
        <meta name="description" content="A modular multilingual Content Management System built with Laravel 5. Introducing a full-featured modular multilingual CMS built on top of the Laravel framework." />
    @show
    <title>@section('title')AsgardCms @show </title>
    <?php endif; ?>
    <meta property="og:image" content="{{ asset('/assets/images/thor-the-dark-world-asgard.jpg')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta id="token" name="token" value="{{ csrf_token() }}" />
    <!--[if lte IE 8]>{!! Theme::script('js/ie/html5shiv.js') !!}<![endif]-->
    {!! Theme::style('css/prism.css') !!}
    {!! Theme::style('css/asgard.css') !!}
    <!--[if lte IE 8]>{!! Theme::style('css/ie8.css') !!}<![endif]-->
    @section('styles')
    @show
</head>
@include("partials.{$header}-header")
