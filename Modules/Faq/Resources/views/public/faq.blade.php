@extends('layouts.master')

@section('title')F.A.Q. | @parent @stop

@section('content')
    <!-- Main -->
    <section id="main" class="container">
        <header>
            <h2>Frequently Asked Questions</h2>
            <p>All your questions answered</p>
        </header>
        <div class="box">
            <ul class="alt">
                <?php if (isset($faqs)): ?>
                    <?php foreach($faqs as $faq): ?>
                        <li>
                            <strong>{{ $faq->question }}</strong>
                            <br/>
                            {!! $faq->answer !!}
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="row">
            <div class="12u">
                <a class="button special fit icon fa-check" href="{{ URL::to('/') }}#cta">
                    Apply for beta access
                </a>
            </div>
        </div>
    </section>
@stop
