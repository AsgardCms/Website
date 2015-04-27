@extends('layouts.master')

@section('content')
    <section id="main" class="container">
        <header>
            <h2>Edit your account</h2>
        </header>
        <div class="row box row-box">
            <div class="3u 3u(2) 12u$(4)">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="9u 9u(2) 12u$(4) content">
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

                    <div class="row uniform 50%">
                        <div class="12u">
                            <input type="submit" class="btn btn-info btn-block" value="Update"/>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop
