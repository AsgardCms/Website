@extends('layouts.master')

@section('title')
{{ trans('user::auth.login') }} | @parent
@stop

@section('content')
<section id="main" class="container">
    <header>
        <h2>{{ trans('user::auth.login') }}</h2>
    </header>
    <div class="box">
        @include('partials.notifications')
        {!! Form::open(['route' => 'login.post']) !!}
        <div class="row uniform 50%">
            <div class="12u">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control"
                           placeholder="{{ trans('user::auth.email') }}" value="{{ Input::old('email')}}"/>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="row uniform 50%">
            <div class="12u">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password"
                           class="form-control" placeholder="Password"
                           value="{{ Input::old('password')}}"/>
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="row uniform 50%">
            <div class="12u">
                <div class="form-group">
                    <input type="checkbox" name="remember_me" id="remember_me"/>
                    <label for="remember_me">{{ trans('user::auth.remember me') }}</label>
                </div>
            </div>
        </div>
        <div class="row uniform 50%">
            <div class="12u">
                <input type="submit" class="button  special fit" value="{{ trans('user::auth.login') }}"/>
                <a href="{{URL::route('register')}}" class="button fit">Make an account</a>
                <p style="text-align: center;">
                    <a href="{{URL::route('reset')}}">{{ trans('user::auth.forgot password') }}</a>
                </p>
            </div>
        </div>
        </form>
    </div>
</section>

@stop
