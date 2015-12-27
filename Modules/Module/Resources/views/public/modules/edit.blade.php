@extends('layouts.master')

@section('styles')
    {!! Theme::style('css/simplemde.min.css') !!}
    <style>
        .CodeMirror {
            height: 300px;
        }
    </style>
@stop
@section('content')
    <section id="main" class="container">
        <header>
            <h2>Editing a module before submission</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content" id="app">
                {!! Form::open(['route' => ['p.modules.update', $module->id]]) !!}
                <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                <input type="hidden" v-model="favourites" name="favourites">
                <input type="hidden" v-model="total_downloads" name="total_downloads">
                <input type="hidden" v-model="monthly_downloads" name="monthly_downloads">
                <input type="hidden" v-model="daily_downloads" name="daily_downloads">
                <div class="row uniform 50%">
                    <div class="9u 12u(mobilep) {{ $errors->has('packagist_uri') ? ' has-error' : '' }}">
                        <input type="text" name="packagist_uri" id="packagist_uri" placeholder="Packagist vendor/name" v-model="packagist_uri">
                        {!! $errors->first('packagist_uri', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="3u 12u(mobilep)">
                        <a href="" class="fit fetchDataButton button" @click.prevent="fetchData" v-show="packagist_uri">Load</a>
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep) {{ $errors->has('vendor') ? ' has-error' : '' }}">
                        <input type="text" name="vendor" id="vendor" placeholder="Vendor" v-model="vendor">
                        {!! $errors->first('vendor', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="6u 12u(mobilep) {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" id="name" placeholder="Name" v-model="name">
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u 12u(mobilep) {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                        <input type="text" name="excerpt" id="excerpt" placeholder="Excerpt" v-model="excerpt">
                        {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u{{ $errors->has('category') ? ' has-error' : '' }}">
                        <div class="select-wrapper">
                            <select name="category_id" id="category" v-model="category">
                                <option value="">- Category -</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                <?php endforeach; ?>
                            </select>
                            {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <textarea name="description" class="descriptionMde" id="description" placeholder="Module Description">{{ old('description', $module->description) }}</textarea>
                        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="12u{{ $errors->has('documentation') ? ' has-error' : '' }}">
                        <label for="documentation">Documentation</label>
                        <textarea name="documentation" class="documentationMde" id="documentation">{{ old('documentation', $module->documentation) }}</textarea>
                        {!! $errors->first('documentation', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions pull-right">
                            <li><a href="{{ route('p.modules.index') }}">Back to index</a></li>
                            <li><input type="submit" value="Go to next step"></li>
                        </ul>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop

@section('scripts')
    <?php if (app()->environment() === 'local'): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.13/vue.js"></script>
    <?php else: ?>
        {!! Theme::script('js/vue.min.js') !!}
    <?php endif; ?>
    {!! Theme::script('js/vue-resource.min.js') !!}
    {!! Theme::script('js/simplemde.min.js') !!}
    <script>
        var routes = {
            modulePackagistData: '{{ route('module.packagist_data') }}'
        };
        var oldInput = {
            packagist_uri: '{{ old('packagist_uri', $module->packagist_uri) }}',
            vendor: '{{ old('vendor', $module->vendor) }}',
            name: '{{ old('name', $module->name) }}',
            excerpt: '{{ old('excerpt', $module->excerpt) }}',
            category: '{{ old('category', $module->category->id) }}',
            favourites: '{{ old('favourites', $module->favourites) }}',
            total_downloads: '{{ old('total_downloads', $module->total_downloads) }}',
            monthly_downloads: '{{ old('monthly_downloads', $module->monthly_downloads) }}',
            daily_downloads: '{{ old('daily_downloads', $module->daily_downloads) }}'
        };
        var descriptionMde = new SimpleMDE({
            element: $(".descriptionMde")[0],
            spellChecker: false
        });
        var documentationMde = new SimpleMDE({
            element: $(".documentationMde")[0],
            spellChecker: false
        });
        var mde = {
            descriptionMde: descriptionMde,
            documentationMde: documentationMde
        };
    </script>
    <script src="{!! Module::asset('module:js/frontend_module_loading.js') !!}"></script>
@stop
