@extends('layouts.master')
@section('styles')
    <style>
        figure {
            margin: 0;
        }
        figure > a {
            border: none;
        }

        figure img {
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

        #main .features .feature {
            width: 48%;
            padding: 0 !important;
        }

        #main .features .feature section {
            padding: 3em 1.1em;
        }
        .box-content {
            padding: 10px;
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
    <section id="main" class="container">
        <header style="margin-bottom: 0;">
            <h2>Sites built with AsgardCms</h2>
        </header>

        <section id="main" class="container" style="padding-top: 25px">
            <div class="features">
                <?php foreach ($projects as $project): ?>
                    <div class="box special feature">
                        <figure>
                            <a href="{{ $project->present()->targetUrl }}" target="_blank">
                                <img src="{{ $project->image->path }}" alt="{{ $project->website_name }}"/>
                            </a>
                        </figure>
                        <div class="box-content">
                            <h3>
                                <a href="{{ $project->present()->targetUrl }}" target="_blank">{{ $project->website_name }}</a>
                            </h3>
                            <small style="font-size: .8em">Developed by <a href="{{ $project->owner_url }}" target="_blank">{{ $project->owner_name }}</a></small>
                            {!! $project->description !!}
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <div class="row">
            <div class="6u 12u(2)">
                <a class="button fit icon fa-download" href="{{ route('page', ['install'])  }}">
                    Install AsgardCms
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
