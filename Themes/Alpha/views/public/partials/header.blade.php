<!DOCTYPE HTML>
<html>
	<head>
		<title>@section('title')Asgard CMS @show </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="A modular multilingual Content Management System built with Laravel 5. Introducing a full-featured modular multilingual CMS built on top of the Laravel framework." />
		<meta name="keywords" content="laravel, CMS, Modular, Multilingual" />

		<meta property="og:title" content="A modular multilingual Content Management System built with Laravel 5" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://asgardcms.com" />
        <meta property="og:description" content="Introducing a full-featured modular multilingual CMS built on top of the Laravel framework. Asgard CMS will kickstart all your future client applications." />
        <meta property="og:image" content="{{ asset('/assets/images/thor-the-dark-world-asgard.jpg')}}" />

		<!--[if lte IE 8]><script src="assets/css/ie/html5shiv.js"></script><![endif]-->
		{!! Theme::style('css/dist/all.min.css') !!}
		<noscript>
			{!! Theme::style('css/style-wide.css') !!}
			{!! Theme::style('css/style-normal.css') !!}
			{!! Theme::style('css/style-narrow.css') !!}
			{!! Theme::style('css/style-narrower.css') !!}
			{!! Theme::style('css/style-mobile.css') !!}
			{!! Theme::style('css/style-mobilep.css') !!}
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('/assets/css/ie/v8.css')}}" /><![endif]-->
	</head>
	@include("public.partials.{$header}-header")
