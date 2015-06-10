@extends('layouts.master')

@section('content')
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>Installation</h2>
        <p>Install AsgardCms in less then 5 minutes!</p>
    </header>
    <div class="box">
        <h3>Get the code</h3>
        <p>
            <ol>
                <li>
                    <p>
                        First you can get the code using the following command: <br/>
                        <code>
                            composer create-project asgardcms/platform your-project-name
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
    <div class="row">
        <div class="6u 12u(2)">
            <a class="button special fit icon fa-book" href="{{ route('doc.index') }}" target="_blank">
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
