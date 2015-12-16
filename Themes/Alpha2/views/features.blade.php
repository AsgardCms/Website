@extends('layouts.master')

@section('styles')
    <style>
        figure {
            margin: 0;
        }

        figure > img {
            width: 100%;
        }

        #main .features {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-align-content: stretch;
            -ms-flex-line-pack: stretch;
            align-content: stretch;
            -webkit-align-items: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            margin: 1em 0;
        }

        .icon.major {
            margin-bottom: 40px;
        }

        #main .features .feature {
            width: 30%;
            padding: 0 !important;
        }

        #main .features.developer .feature {
            width: 48%;
        }

        #main .features .feature section {
            padding: 3em 1.1em;
        }

        @media screen and (max-width: 900px) {
            #main .features .feature {
                width: 45%;
            }
        }

        @media screen and (max-width: 750px) {
            #main .features.developer .feature {
                width: 100%;
            }
        }

        @media screen and (max-width: 500px) {
            #main .features .feature {
                width: 100%;
            }
        }
    </style>
    @stop
    @section('content')
            <!-- Main -->
    <section id="main" class="container">
        <header>
            <h2>Features</h2>

            <p>An elegant, full-featured, modular multilingual CMS built on top of the Laravel framework.</p>
        </header>
        <div class="features">
            <div class="box special feature">
                <section>
                    <span class="icon major fa-bolt accent4"></span>

                    <h3>Easy to install</h3>

                    <p>Get up and running in less then 5 minutes! Clone the repository, run the installation script and you're
                        ready to go.</p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <span class="icon major fa-flag accent3"></span>

                    <h3>Multilingual</h3>

                    <p>
                        Asgard CMS is fully multilingual with support for a vast array of languages. Manage languages easily through the CMS interface!
                    </p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <span class="icon major fa-th-large accent2"></span>

                    <h3>Modular</h3>

                    <p>Asgard CMS is fully modular. Each part of the CMS is a separate, decoupled module.</p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="12u 12u(2)" style="text-align: center; margin: 50px 0;">
                <h2>Ready-to-use Modules make your life easier!</h2>

                <p>There are a variety of ready-to-use modules, pick the ones that <strong>your application</strong> requires!</p>
            </div>
        </div>

        <div class="features">
            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-1-dashboard.png', 'featureThumb') }}"
                         alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Dashboard</h3>

                        <p>An attractive dashboard, coupled with <a href="{{ url('docs/dashboard-module/widgets') }}">custom widgets</a>, gives you and your clients great visibility.</p>
                    </section>
                </div>
            </div>
            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-2-page-module.png', 'featureThumb') }}"
                         alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Page Management</h3>

                        <p>
                            Content management out of the box.
                        </p>
                    </section>
                </div>
            </div>
            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-3-media-module.png', 'featureThumb') }}"
                         alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Media Management</h3>

                        <p>Centralised Media Management, allowing you to <a href="{{ url('docs/media-module/thumbnails') }}">define image thumbnail dimensions</a>, <a href="{{ url('docs/media-module/refreshing-thumbnails') }}">regenerate your thumbnails</a>, and <a href="{{ url('docs/media-module/getting-a-thumbnail') }}">display your images in your defined sizes & ratios!</a>.
                        </p>
                    </section>
                </div>
            </div>

            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-5-permissions.png', 'featureThumb') }}"
                         alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Flexible Permissions</h3>

                        <p>
                            The permissions are flexible, and easily manageable.
                        </p>
                    </section>
                </div>
            </div>
            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-7-workshop.png', 'featureThumb') }}" alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Easy Module Management</h3>

                        <p>
                            Manage all your modules in the Workshop. Publish assets, view changelogs and more!
                        </p>
                    </section>
                </div>
            </div>
            <div class="feature box special">
                <figure>
                    <img src="{{ Imagy::getThumbnail('/assets/media/asgard-4-menu-module.png', 'featureThumb') }}"
                         alt=""/>
                </figure>
                <div class="feature-modules">
                    <section>
                        <h3>Customise your Menus</h3>

                        <p>
                            <a href="{{ url('docs/menu-module/managing-menus') }}">Manage multiple menus</a>,
                            re-order items by drag & drop, and display them anywhere.
                        </p>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="12u 12u(2)" style="text-align: center; margin: 50px 0;">
                <h2>Developer tools</h2>

                <p><strong>AsgardCms</strong> is made <em>for</em> developers - the built-in rapid-development tools allow you to stop wasting your time on architecture and focus on the functionality!</p>
            </div>
        </div>

        <div class="row features developer">
            <div class="box special feature">
                <section>
                    <h3>Modules</h3>

                    <p>
                        <storng>Quickly</storng>
                        create new modules with the command line scaffolding tool. You'll have a translatable, PSR-4 compliant module within seconds.
                    </p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <h3>Themes</h3>

                    <p>
                        <storng>Quickly</storng> create new themes from the command line. Theme inheritence is also supported, powered by the <a href="https://github.com/floatingpointsoftware/stylist" target="_blank">Stylist</a> package.
                    </p>
                </section>
            </div>
        </div>
        @include('partials.call_to_action_install')
    </section>

@stop
