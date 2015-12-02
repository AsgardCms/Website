<!DOCTYPE HTML>
<html>
<head>
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
    <?php if (isset($page)): ?>
    <meta name="description" content="{!! $page->meta_description !!}" />
    <title>{!! $page->meta_title !!}</title>
    <?php else: ?>
    @section('meta')
        <meta name="description" content="A modular multilingual Content Management System built with Laravel 5. Introducing a full-featured modular multilingual CMS built on top of the Laravel framework." />
    @show
    <title>@section('title')AsgardCms @show </title>
    <?php endif; ?>
    <meta property="og:image" content="{{ asset('/assets/images/thor-the-dark-world-asgard.jpg')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]>{!! Theme::script('js/ie/html5shiv.js') !!}<![endif]-->
    {!! Theme::style('css/asgard.css') !!}
    <!--[if lte IE 8]>{!! Theme::style('css/ie8.css') !!}<![endif]-->
</head>
<body class="landing">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
        <nav id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>
                    <a href="#" class="icon fa-angle-down">Layouts</a>
                    <ul>
                        <li><a href="generic.html">Generic</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="elements.html">Elements</a></li>
                        <li>
                            <a href="#">Submenu</a>
                            <ul>
                                <li><a href="#">Option One</a></li>
                                <li><a href="#">Option Two</a></li>
                                <li><a href="#">Option Three</a></li>
                                <li><a href="#">Option Four</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="button">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <h2>Alpha</h2>
        <p>Another fine responsive site template freebie by HTML5 UP.</p>
        <ul class="actions">
            <li><a href="#" class="button special">Sign Up</a></li>
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Main -->
    <section id="main" class="container">

        <section class="box special">
            <header class="major">
                <h2>Introducing the ultimate mobile app
                    <br />
                    for doing stuff with your phone</h2>
                <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc ornare<br />
                    adipiscing nunc adipiscing. Condimentum turpis massa.</p>
            </header>
            <span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
        </section>

        <section class="box special features">
            <div class="features-row">
                <section>
                    <span class="icon major fa-bolt accent2"></span>
                    <h3>Magna etiam</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                </section>
                <section>
                    <span class="icon major fa-area-chart accent3"></span>
                    <h3>Ipsum dolor</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                </section>
            </div>
            <div class="features-row">
                <section>
                    <span class="icon major fa-cloud accent4"></span>
                    <h3>Sed feugiat</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                </section>
                <section>
                    <span class="icon major fa-lock accent5"></span>
                    <h3>Enim phasellus</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                </section>
            </div>
        </section>

        <div class="row">
            <div class="6u 12u(narrower)">

                <section class="box special">
                    <span class="image featured"><img src="images/pic02.jpg" alt="" /></span>
                    <h3>Sed lorem adipiscing</h3>
                    <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    <ul class="actions">
                        <li><a href="#" class="button alt">Learn More</a></li>
                    </ul>
                </section>

            </div>
            <div class="6u 12u(narrower)">

                <section class="box special">
                    <span class="image featured"><img src="images/pic03.jpg" alt="" /></span>
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
        <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>

        <form>
            <div class="row uniform 50%">
                <div class="8u 12u(mobilep)">
                    <input type="email" name="email" id="email" placeholder="Email Address" />
                </div>
                <div class="4u 12u(mobilep)">
                    <input type="submit" value="Sign Up" class="fit" />
                </div>
            </div>
        </form>

    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
{!! Theme::script('js/jquery.min.js') !!}
{!! Theme::script('js/jquery.dropotron.min.js') !!}
{!! Theme::script('js/jquery.scrollgress.min.js') !!}
{!! Theme::script('js/skel.min.js') !!}
{!! Theme::script('js/util.js') !!}
<!--[if lte IE 8]>{!! Theme::script('js/ie/respond.min.js') !!}<![endif]-->
{!! Theme::script('js/main.js') !!}

</body>
</html>
