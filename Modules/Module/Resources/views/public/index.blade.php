@extends('layouts.master')

@section('title')Modules | @parent @stop

@section('meta')
    <meta name="description" content="AsgardCms Modules" />
@stop

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Modules</h2>
        </header>
        <div class="row">
            <div class="3u">
                <div class="row box row-box 0%">
                    @include('module::public.partials.sidebar')
                </div>
            </div>
            <div class="9u">
                <div class="row uniform">
                    <div class="12u box">
                        asd
                    </div>
                    <div class="12u box">
                        asd
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
@stop
