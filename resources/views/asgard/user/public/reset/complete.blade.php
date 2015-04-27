@extends('layouts.account')

@section('title')
    {{ trans('user::auth.reset password') }} | @parent
@stop

@section('content')
    <section id="main" class="container">
        <header>
            <h2>{{ trans('user::auth.reset password') }}</h2>
        </header>
        <div class="box">
            @include('flash::message')
            {!! Form::open() !!}
            <div class="row uniform 50%">
                <div class="12u">
                    <div class="form-group{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                        {!! Form::label('password', trans('user::auth.password')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user::auth.password')]) !!}
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
                        {!! Form::label('password_confirmation', trans('user::auth.password confirmation')) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('user::auth.password confirmation')]) !!}
                        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="row uniform 50%">
                <div class="12u">
                    <input type="submit" class="btn btn-info btn-block" value="{{ trans('user::auth.reset password') }}" />
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop
