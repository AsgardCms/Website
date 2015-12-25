@extends('layouts.master')

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Your Modules</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content">
                <?php if ($modules->count() === 0): ?>
                    <p>You have no modules. <a href="">Submit one.</a></p>
                <?php endif; ?>
                <ul>
                    <?php foreach ($modules as $module): ?>
                        <li>
                            <a href="">{{ $module->vendor . '/' . $module->name }}</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
@stop
