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
                <p>
                    <strong>Thank you</strong> for submitting your module! <br>
                    We're starting our review process and will let you know if you module has been accepted. Please do keep in mind only the best module with perfect quality will be accepted.
                </p>
                <p>It is possible we contact your to add changes to the module to make it better for the end user.</p>
                <p>Happy developing!</p>
            </div>
        </div>
    </section>
@stop
