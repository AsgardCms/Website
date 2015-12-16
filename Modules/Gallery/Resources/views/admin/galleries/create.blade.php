@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('gallery::galleries.title.create gallery') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.gallery.gallery.index') }}">{{ trans('gallery::galleries.title.galleries') }}</a></li>
        <li class="active">{{ trans('gallery::galleries.title.create gallery') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.gallery.gallery.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('gallery::admin.galleries.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    {!! Form::normalInput('website_name', 'Website name', $errors) !!}
                    <div class="checkbox{{ $errors->has('has_hidden_website_url') ? ' has-error' : '' }}">
                        <label for="has_hidden_website_url">
                            <input type="hidden" name="has_hidden_website_url">
                            <input id="has_hidden_website_url" name="has_hidden_website_url" type="checkbox"
                                   class="flat-blue" value="1" />
                            Has hidden website URL
                            {!! $errors->first('has_hidden_website_url', '<span class="help-block">:message</span>') !!}
                        </label>
                    </div>
                    <div class="website_url">
                        {!! Form::normalInput('website_url', 'Website url', $errors) !!}
                    </div>
                    {!! Form::normalInput('owner_name', 'Owner name', $errors) !!}
                    {!! Form::normalInput('owner_url', 'Owner url', $errors) !!}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.gallery.gallery.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.gallery.gallery.index') ?>" }
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

            $('input[type="checkbox"]').on('ifToggled', function(){
                $('.website_url').toggle();
            });
        });
    </script>
@stop
