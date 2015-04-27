@extends('layouts.master')

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Beta Access Status</h2>
        </header>
        <div class="row box row-box">
            <div class="3u 3u(2) 12u$(4)">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="9u 9u(2) 12u$(4) content">
                <?php if ($entry): ?>
                    <h4><strong>Status</strong></h4>
                    <?php if ($entry->accepted && $entry->activation->completed): ?>
                        <p>
                            You have access to the <strong>AsgardCms</strong> beta, congratulations! <br/>
                            You can install AsgardCms by checking out the <a href="{{ route('doc.index') }}">documentation</a>
                        </p>
                        <h4><strong>Feedback</strong></h4>
                        <p>You can provide feedback on the following channels:</p>
                        <ul>
                            <li><a href="http://slack.asgardcms.com" target="_blank">Slack</a> for general chat and basic help</li>
                            <li><a href="http://asgardcms.uservoice.com" target="_blank">Uservoice</a> for feature requests</li>
                        </ul>
                    <?php elseif ($entry->accepted): ?>
                        <p>
                            You have access to the <strong>AsgardCms</strong> beta but haven't accepted the invitation yet. Have you checked your email?
                        </p>
                    <?php else: ?>
                        <p>You're #{{ $entry->id }} <strong>AsgardCms</strong> beta waiting list.</p>
                        <p>A little bit more patience...</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>You haven't applied to the waiting list yet! What are you waiting for ?</p>
                    <p>
                        <a href="{{ route('beta.subscribe', [$user->email])}}"
                           class="button special fit icon fa-check">Apply</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
@stop
