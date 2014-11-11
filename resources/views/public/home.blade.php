@extends('public.layouts.landing')

@section('content')
<!-- Banner -->
<section id="banner">
    <h2>Asguard CMS</h2>
    <p>A modular multilingual CMS built with Laravel 5.</p>
    <ul class="actions">
        <li><a href="{{ URL::route('install') }}" class="button special">Install</a></li>
        <li><a href="#" class="button">Learn More</a></li>
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
                Asguard CMS will kickstart all your future client applications.
            </p>
        </header>
        <span class="image featured"><img src="assets/images/pic01.jpg" alt="" /></span>
    </section>

    <section class="box special features">
        <div class="features-row">
            <section>
                <span class="icon major fa-cloud accent4"></span>
                <h3>Easy to install</h3>
                <p>Get up and running in less then 5minutes!</p>
            </section>
            <section>
                <span class="icon major fa-area-chart accent3"></span>
                <h3>Multilingual</h3>
                <p>Asguard CMS is completely multilingual. The backend too.</p>
            </section>
        </div>
        <div class="features-row">
            <section>
                <span class="icon major fa-bolt accent2"></span>
                <h3>Modular</h3>
                <p>Asguard CMS uses a modular approach. Each part of the CMS is a seperate module, all the modules are loosely coupled.</p>
            </section>
            <section>
                <span class="icon major fa-lock accent5"></span>
                <h3>Enim phasellus</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
            </section>
        </div>
    </section>

    <div class="row">
        <div class="6u 12u(2)">
            <section class="box special">
                <span class="image featured"><img src="assets/images/pic02.jpg" alt="" /></span>
                <h3>Sed lorem adipiscing</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                <ul class="actions">
                    <li><a href="#" class="button alt">Learn More</a></li>
                </ul>
            </section>
        </div>
        <div class="6u 12u(2)">

            <section class="box special">
                <span class="image featured"><img src="assets/images/pic03.jpg" alt="" /></span>
                <h3>Accumsan integer</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                <ul class="actions">
                    <li><a href="#" class="button alt">Learn More</a></li>
                </ul>
            </section>

        </div>
    </div>

</section>

<!-- CTA -->
<section id="cta">

    <h2>Sign up for beta access</h2>
    <p>Your email will safely be stored. You'll be kept up to date with 	 </p>

    <form>
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
