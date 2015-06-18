@extends('layouts.master')

@section('content')
        <!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Oops, something went wrong.</h2>
        <p>Our developers were informed of this issue.</p>
    </header>
    <div class="row">
        <div class="6u 12u(2)">
            <a class="button fit icon fa-angle-left" href="{{ route('homepage') }}">
                Back to homepage
            </a>
        </div>
        <div class="6u 12u(2)">
            <a class="button special fit icon fa-book" href="{{ route('doc.index') }}">
                Go to the documentation
            </a>
        </div>
    </div>
</section>

@stop
