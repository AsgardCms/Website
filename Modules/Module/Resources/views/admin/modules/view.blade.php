@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('module::modules.title.edit module') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.module.module.index') }}">{{ trans('module::modules.title.modules') }}</a></li>
        <li class="active">Viewing module</li>
    </ol>
@stop

@section('styles')
    <style>
        .CodeMirror {
            height: 300px;
        }
    </style>
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>Submitted at</dt>
                        <dd>
                            {{ $module->submitted_at }}
                        </dd>
                        <dt>Packagist uri</dt>
                        <dd>
                            {{ $module->packagist_uri }}
                            <a href="{{ $module->present()->packagistUrl }}" target="_blank" class="btn btn-primary btn-flat btn-xs">View On packagist</a>
                        </dd>
                        <dt>Excerpt</dt>
                        <dd>
                            {{ $module->excerpt }}
                        </dd>
                        <dt>Category</dt>
                        <dd>
                            {{ $module->category->name }}
                        </dd>
                        <dt>Author</dt>
                        <dd>
                            {{ $module->user->present()->fullName }} ({{ $module->user->email }})
                        </dd>
                    </dl>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        <textarea class="form-control descriptionMde" name="description" id="description">{{ $module->description }}</textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('documentation', 'Documentation') !!}
                        <textarea class="form-control documentationMde" name="documentation" id="documentation">{{ $module->documentation }}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat pull-right">{{ trans('core::core.button.update') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.module.module.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
    </div>
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
            var descriptionMde = new SimpleMDE({element: $(".descriptionMde")[0]});
            var documentationMde = new SimpleMDE({element: $(".documentationMde")[0]});
        });
    </script>
@stop
