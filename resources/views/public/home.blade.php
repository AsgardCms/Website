@extends('public.layouts.landing')

@section('content')
<!-- Banner -->
<section id="banner">
    <h2>Asgard CMS</h2>
    <p>A modular multilingual CMS built with Laravel 5.</p>
    <ul class="actions">
        {{--<li><a href="{{ URL::route('install') }}" class="button special">Install</a></li>--}}
        <li><a href="#cta" class="button">Apply for the beta</a></li>
    </ul>
</section>

<!-- Main -->
<section id="main" class="container">

    <section class="box special">
        <header class="major">
            <h2>Introducing a full-featured modular multilingual CMS
            <br />
            built on top of the Laravel framework.</h2>
            <p>
                Asgard CMS will kickstart all your future client applications.
            </p>
        </header>
        <span class="image featured"><img src="assets/images/admin-ui-screenshot.png" alt="" /></span>
    </section>

    <section class="box special features">
        <div class="features-row">
            <section>
                <span class="icon major fa-bolt accent4"></span>
                <h3>Easy to install</h3>
                <p>Get up and running in less then 5 minutes!</p>
            </section>
            <section>
                <span class="icon major fa-flag accent3"></span>
                <h3>Multilingual</h3>
                <p>Asgard CMS is completely multilingual. The backend too.</p>
            </section>
        </div>
        <div class="features-row">
            <section>
                <span class="icon major fa-th-large accent2"></span>
                <h3>Modular</h3>
                <p>Asgard CMS uses a modular approach. Each part of the CMS is a separate module, all modules are loosely coupled.</p>
            </section>
            <section>
                <span class="icon major fa-smile-o accent5"></span>
                <h3>Clean UI</h3>
                <p>The backend UI uses the <a target="_blank" href="http://almsaeedstudio.com/AdminLTE">Admin LTE</a> theme for a clear and to the point user interface. Your clients will feel right at home.</p>
            </section>
        </div>
    </section>

    <div class="row">
        <ul class="bxslider">
          <li><img src="assets/images/admin-ui-screenshot.png" /></li>
          <li><img src="assets/images/asgard-media.png" /></li>
          <li><img src="assets/images/asgard-roles.png" /></li>
        </ul>
    </div>

</section>

<!-- CTA -->
<section id="cta">

    <h2>Apply for beta access</h2>
    <p>Your email will safely be stored. You will be on the waiting list to join the beta program.</p>

    <form action="{{ URL::route('subscribe') }}" method="POST" class="jsSubscribe">
        {!! Form::token() !!}
        <div class="row uniform 50%">
            <div class="8u 12u(3)">
                <input type="email" name="email" id="email" placeholder="Email Address" />
            </div>
            <div class="4u 12u(3)">
                <input type="submit" value="Sign Up" class="fit" />
            </div>
        </div>
    </form>

</section>
@stop

@section('scripts')
<script>
$( document ).ready(function() {
//    $.ajaxSetup({
//        headers: {
//            'X-XSRF-TOKEN': $('input[name="_token"]').val()
//        }
//    });

    $('.bxslider').bxSlider();

    $(document).on('submit', 'form.jsSubscribe', function(e) {
        e.preventDefault();
        var $form = $(this);
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: {email: $form.find('input[name=email]').val()},
            success: function(data) {
                $form.html('<p class="success">' + data + '</p>');
            },
            error:function (xhr){
                var error = JSON.parse(xhr.responseText);
                $form.html('<p class="error">' + error.email[0] + '</p>');
            }
        });
    });
});
</script>
@stop
