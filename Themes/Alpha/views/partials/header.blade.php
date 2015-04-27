<!DOCTYPE HTML>
<html>
	<head>
		<title>@section('title')Asgard CMS @show </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="A modular multilingual Content Management System built with Laravel 5. Introducing a full-featured modular multilingual CMS built on top of the Laravel framework." />
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
        <meta property="og:image" content="{{ asset('/assets/images/thor-the-dark-world-asgard.jpg')}}" />

		<!--[if lte IE 8]><script src="assets/css/ie/html5shiv.js"></script><![endif]-->
		{!! Theme::style('css/dist/all.min.css') !!}
		<noscript>
			{!! Theme::style('css/dist/style-wide.min.css') !!}
			{!! Theme::style('css/dist/style-normal.min.css') !!}
			{!! Theme::style('css/dist/style-narrow.min.css') !!}
			{!! Theme::style('css/dist/style-narrower.min.css') !!}
			{!! Theme::style('css/dist/style-mobile.min.css') !!}
			{!! Theme::style('css/dist/style-mobilep.min.css') !!}
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('/assets/css/ie/v8.css')}}" /><![endif]-->
	</head>
	@include("partials.{$header}-header")
