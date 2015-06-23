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

            <p>An elegant full-featured modular multilingual CMS built on top of the Laravel framework.</p>
        </header>
        <div class="features">
            <div class="box special feature">
                <section>
                    <span class="icon major fa-bolt accent4"></span>

                    <h3>Easy to install</h3>

                    <p>Get up and running in less then 5 minutes! Clone the repository, run install command and you're
                        done.</p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <span class="icon major fa-flag accent3"></span>

                    <h3>Multilingual</h3>

                    <p>
                        Asgard CMS is completely multilingual. The backend too. Add languages as you need, manage them,
                        easily.
                    </p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <span class="icon major fa-th-large accent2"></span>

                    <h3>Modular</h3>

                    <p>Asgard CMS uses a modular approach. Each part of the CMS is a separate module, all modules are
                        decoupled. Use only the ones you need.</p>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="12u 12u(2)" style="text-align: center; margin: 50px 0;">
                <h2>Use the ready to use modules to quickstart your app!</h2>

                <p>There are a number of ready to use modules. Some of those are required, pick and choose the others
                    <strong>you need</strong>.</p>
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

                        <p>
                            The dashboard is what your client sees first. Add <a
                                    href="{{ route('doc.show', ['dashboard-module/widgets']) }}">custom widgets </a>to
                            you dashboard, whatever data you wish on it!
                        </p>
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
                            Content is important, start creating content out of the box. Manage your pages easily.
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

                        <p>
                            Manage you media in one place. Quickly add <a
                                    href="{{ route('doc.show', ['media-module/thumbnails']) }}">setup thumbnails</a>, <a
                                    href="{{ route('doc.show', ['media-module/refreshing-thumbnails']) }}">regenerate
                                old thumbnails</a>, and <a
                                    href="{{ route('doc.show', ['media-module/getting-a-thumbnail']) }}">display your
                                thumbnails</a>.
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
                        <h3>Manage your modules</h3>

                        <p>
                            Manage all your modules in one place. Publish assets, view changelogs and more.
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
                        <h3>Menus</h3>

                        <p>
                            <a href="{{ route('doc.show', ['menu-module/managing-menus']) }}">Manage multiple menus</a>,
                            re-order items by drag & drop, and display them where you want.
                        </p>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="12u 12u(2)" style="text-align: center; margin: 50px 0;">
                <h2>Developer tools</h2>

                <p><strong>AsgardCms</strong> is made <em>for</em> developers, use this rapid application development
                    process and stop wasting time building the architecture.</p>
            </div>
        </div>

        <div class="row features developer">
            <div class="box special feature">
                <section>
                    <h3>Modules</h3>

                    <p>
                        <storng>Quickly</storng>
                        create new modules with the command line tool, and our scaffolding tool. You'll have a module
                        setup very fast. All modules are pure PSR-4 autoloaded packages.
                    </p>
                </section>
            </div>
            <div class="box special feature">
                <section>
                    <h3>Themes</h3>

                    <p>
                        <storng>Quickly</storng>
                        create new themes from the command line. Create the theme specific for your client, easily use
                        theme inheritance thanks to the <a href="https://github.com/floatingpointsoftware/stylist"
                                                           target="_blank">Stylist</a> package.
                    </p>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="6u 12u(2)">
                <a class="button special fit icon fa-book" href="{{ route('doc.index') }}">
                    Read the full documentation
                </a>
            </div>
            <div class="6u 12u(2)">
                <a class="button fit icon fa-th-large" href="https://github.com/AsgardCms" target="_blank">
                    View Modules
                </a>
            </div>
        </div>
    </section>

@stop
