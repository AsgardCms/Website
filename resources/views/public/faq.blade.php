@extends('public.layouts.master')

@section('content')
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Frequently Asked Questions</h2>
        <p>All your questions answered</p>
    </header>
    <div class="box">
        <h3>Get the code</h3>
        <p>
            <ul class="alt">
                <li>
                    <strong>Will Asgard CMS be open source ?</strong>
                    <br/>
                    Yes, <em>Asgard CMS</em> will be fully open sourced when the primary features are done.
                </li>
                <li>
                    <strong>How much will it cost ?</strong>
                    <br/>
                    You will be pleased to read that <em>Asgard CMS</em> will be completely free after release!
                </li>
                <li>
                    <strong>When will it be done ?</strong>
                    <br/>
                    When it's ready.
                </li>
                <li>
                    <strong>How many developers are working on the project ?</strong>
                    <br/>
                    I'm currently the sole developer. If you would be interested to help the project grow, don't hesitate to contact me on <a href="http://twitter.com/nicolaswidart" target="_blank">twitter</a>.
                </li>
            </ul>
        </p>
    </div>
    <div class="row">
        <div class="12u">
            <a class="button special fit icon fa-check" href="{{ URL::route('home') }}#cta">
                Apply for beta access
            </a>
        </div>
    </div>
</section>

@stop
