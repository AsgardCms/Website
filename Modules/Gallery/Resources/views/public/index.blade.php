@extends('layouts.master')
@section('title') Sites Built With AsgardCms | @parent @stop
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

        .error {
            display: block;
            text-align: left;
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
    <div class="app">
        <section id="main" class="container" style="padding-bottom: 0;">
            <header style="margin-bottom: 0;">
                <h2>Sites built with AsgardCms</h2>
                <p>
                    <a href="" class="button special" @click.prevent="openForm">Submit your own website</a>
                </p>
            </header>
        </section>
        <section id="cta" style="display: none;">
            <p>Submit finished websites you have developed with AsgardCms.</p>
            <p class="message"></p>
            <validator name="validationWebsite">
                <form action="{{ route('api.sites.submit') }}" method="POST" class="websiteForm" style="width: 50em;">
                    {!! Form::token() !!}
                    <div class="row uniform 50%">
                        <div class="6u">
                            <input type="text" name="name" id="name" placeholder="Full name"
                                   v-model="name" v-validate:name="['required']" />
                            <span v-show="$validationWebsite.name.required" class="error">Your name is required.</span>
                        </div>
                        <div class="6u">
                            <input type="email" name="email" id="email" placeholder="Email Address"
                                   v-model="email" v-validate:email="['required']"/>
                            <span v-show="$validationWebsite.email.required" class="error">Your email is required.</span>
                        </div>
                        <div class="12u">
                            <input type="text" name="website_url" id="website_url" placeholder="Website URL"
                                   v-model="website_url" v-validate:website_url="['required']"/>
                            <span v-show="$validationWebsite.website_url.required" class="error">The website URL is required.</span>
                        </div>
                        <div class="12u">
                            <textarea name="message" id="message" placeholder="Message"
                                      v-model="message" v-validate:message="['required']"></textarea>
                            <span v-show="$validationWebsite.message.required" class="error">A message is required.</span>
                        </div>
                        <div class="12u">
                            <input type="submit" value="Submit site" class="fit"
                                   @click.prevent="submitWebsite" v-if="$validationWebsite.valid"/>
                        </div>
                    </div>
                </form>
            </validator>
        </section>
    </div>
    <section id="main" class="container">
        <div class="features">
            <?php foreach ($projects as $project): ?>
                <div class="box special feature">
                    <figure>
                        <a href="{{ $project->present()->targetUrl }}" target="_blank">
                            <img src="{{ Imagy::getThumbnail($project->image->path, 'galleryThumbnail') }}" alt="{{ $project->website_name }}"/>
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
        @include('partials.call_to_action_install')
        <div style="margin-top: 5.5em;">
            @include('testimonial::public.partials.random-testimonials')
        </div>
    </section>
@stop

@section('scripts')
    {!! Theme::script('js/vue.min.js') !!}
    {!! Theme::script('js/vue-resource.min.js') !!}
    {!! Theme::script('js/vue-validator.min.js') !!}
    <script>
        $( document ).ready(function() {
            Vue.http.headers.common['X-CSRF-TOKEN'] = window.document.querySelector('meta#token').getAttribute('value');
            new Vue({
                el: '.app',
                data: {
                    name: '',
                    email: '',
                    website_url: '',
                    message: ''
                },
                methods: {
                    openForm: function () {
                        $('#cta').slideToggle();
                    },
                    submitWebsite: function () {
                        var $form = $('.websiteForm'),
                            data = {name: this.name, email: this.email, website_url: this.website_url, message: this.message},
                            $messageWrapper = $('.message');

                        this.$http.post($form.attr('action'), data, function(data) {
                            $form.fadeOut();
                            $messageWrapper.text(data);
                            setTimeout(function () {
                                $('#cta').slideUp();
                            }, 2000);
                        }).error(function (errors) {
                            $messageWrapper.empty();
                            $.each(errors, function (field, error) {
                                $messageWrapper.append(error[0] + '<br />');
                            });
                        });
                    }
                }
            });
        });
    </script>
@stop
