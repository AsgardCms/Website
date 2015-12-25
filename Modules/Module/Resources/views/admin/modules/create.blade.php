@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('module::modules.title.create module') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.module.module.index') }}">{{ trans('module::modules.title.modules') }}</a></li>
        <li class="active">{{ trans('module::modules.title.create module') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.module.module.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom" id="app">
                <div class="tab-content">
                    {!! Form::normalInput('packagist_url', 'Packagist url', $errors, null, ['v-model' => 'packagist_url']) !!}
                    <div class='form-group{{ $errors->has("packagist_url") ? ' has-error' : '' }}'>
                        {!! Form::label("packagist_url", 'Packagist URL') !!}
                        <input type="text" class="form-control" name="packagist_url" id="packagist_url"
                               placeholder="Packagist URL"  value="{{ old('packagist_url') }}" v-model="packagist_url">
                        {!! $errors->first("packagist_url", '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.module.module.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <?php Stylist::activate('Alpha2') ?>
    {!! Theme::script('js/vue.min.js') !!}
    {!! Theme::script('js/vue-resource.min.js') !!}
    <?php Stylist::activate('AdminLTE') ?>
    <script src="{!! Module::asset('module:js/backend_module.js') !!}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.module.module.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    packagist_url: 'asd'
                }
            });
        });

    </script>
@stop
