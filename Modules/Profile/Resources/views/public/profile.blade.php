@extends('layouts.master')

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Edit your account</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content">
                @include('partials.notifications')
                {!! Form::open(['route' => 'user.account.update']) !!}
                <div class="row uniform 50%">
                    <div class="12u">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ trans('user::auth.email') }}" value="{{ Input::old('email', $user->email)}}"/>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <input type="text" name="first_name" class="form-control"
                                   placeholder="First name" value="{{ Input::old('first_name', $user->first_name)}}"/>
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u">
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <input type="text" name="last_name" class="form-control"
                                   placeholder="Last name" value="{{ Input::old('last_name', $user->last_name)}}"/>
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="row uniform 50%">
                    <div class="12u">
                        <input type="submit" class="btn btn-info btn-block" value="Update"/>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop
