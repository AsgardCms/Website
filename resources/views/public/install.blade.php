@extends('public.layouts.master')

@section('content')
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Installation</h2>
        <p>Install Asguard CMS in less then 5 minutes!</p>
    </header>
    <div class="box">
        <h3>Get the code</h3>
        <p>
            <ol>
                <li>
                    <p>
                        First you can get the code using the following command: <br/>
                        <code>
                            composer create-project nwidart/platform your-project-name --prefer-dist --stability=dev
                        </code>
                    </p>
                </li>
                <li>
                    <p>
                        Next, install the composer dependencies: <br/>
                        <code>
                            composer install
                        </code>
                    </p>
                </li>
                <li>
                    <p>
                        Finally, run the install command to get you started:
                        <code style="display: block;">
                            php artisan platform:install
                        </code>
                        This will do the following:
                        <ul>
                            <li>Setup database information</li>
                            <li>Running migrations</li>
                            <li>Running seeds</li>
                            <li>Publishing assets</li>
                            <li>Create a first admin account</li>
                        </ul>
                    </p>
                </li>
                <li>
                    <p>
                        Done! <br/>
                        Enjoy your freshly installed website.
                    </p>
                </li>
            </ol>
        </p>
    </div>
</section>

@stop
