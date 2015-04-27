@extends('layouts.master')

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
            {!! Form::open(['route' => 'reset.post']) !!}
            <div class="row uniform 50%">
                <div class="12u">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" class="form-control"
                               placeholder="{{ trans('user::auth.email') }}" value="{{ Input::old('email')}}" required=""/>
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>

            <div class="row uniform 50%">
                <div class="12u">
                    <input type="submit" class="btn btn-info btn-block" value="{{ trans('user::auth.reset password') }}" />
                    <p><a href="{{URL::route('login')}}">{{ trans('user::auth.I remembered my password') }}</a></p>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </section>
@stop
