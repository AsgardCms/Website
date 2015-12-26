@extends('layouts.master')

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Your Modules</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content">
                {!! Form::open(['route' => ['p.modules.storeGallery', $module->id]]) !!}
                    Creating the gallery
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop
