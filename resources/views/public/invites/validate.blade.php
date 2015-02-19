@extends('public.layouts.master')

@section('title')Final Step | @parent @stop

@section('content')
    <!-- Main -->
    <section id="main" class="container">
        <header>
            <h2>Final Step Before AsgardCms</h2>
            <p>And you'll be in the beta!</p>
        </header>
        <div class="box">
            {!! Form::open(['route' => ['last.action.post', $token], 'method' => 'post']) !!}
                <div class="row uniform 50%">
                    <div class="12u">
                        <input name="username" id="username" value="" placeholder="Github Username" type="text">
                        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
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
