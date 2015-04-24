@extends('layouts.master')

@section('title')Final Step | @parent @stop

@section('content')
    <!-- Main -->
    <section id="main" class="container">
        <header>
            <h2>Final Step Before AsgardCms</h2>
            <p>And you'll be in the beta!</p>
        </header>
        <div class="box">
            <?php if (Session::has('error')): ?>
                <p>
                    {{ Session::get('error') }} <a href="/#cta">Did you apply yet ?</a>
                </p>
            <?php endif; ?>
            <?php if (Session::has('success')): ?>
            <p>
                {{ Session::get('success') }}
            </p>
            <?php endif; ?>
            {!! Form::open(['route' => ['last.action.post', $token], 'method' => 'post']) !!}
                <div class="row uniform 50%">
                    <div class="12u">
                        <input name="username" id="username" value="{{ Input::old('username') }}" placeholder="Github Username" type="text">
                        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u">
                        <input name="email" id="email" value="{{ Input::old('email') }}" placeholder="Email you subscribed with" type="email">
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions align-center">
                            <li><input value="Let me in!" type="submit"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop
