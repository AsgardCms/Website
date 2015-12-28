@extends('layouts.master')

@section('styles')
    {!! Theme::style('css/dropzone.min.css') !!}
@stop
@section('content')
    <section id="main" class="container">
        <header>
            <h2>Add images for {{ $module->packagist_uri }}</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content" id="app">
                @include('partials.notifications')
                <h2>Gallery</h2>
                <p>Add a minimum of 3 images related to your module.</p>
                <form action="" class="dropzone dropzoneOne">{!! csrf_field() !!}</form>

                <h2>Icon</h2>
                <form action="" class="dropzone dropzoneTwo">{!! csrf_field() !!}</form>
                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions pull-right">
                            <li><a href="{{ route('account.modules.edit', $module->id) }}">Back</a></li>
                            <li><a href="{{ route('account.modules.submit', $module->id) }}" class="button special">Submit for approval</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')
    {!! Theme::script('js/dropzone.js') !!}
    <script>
        var savedGalleryImages = [];
        var savedIconImage = [];
        @if (isset($galleryImages))
            @foreach ($galleryImages as $image)
                savedGalleryImages.push({
                    id: "{{ $image->id }}",
                    name: "{{ $image->filename }}",
                    url: "{{ $image->path }}",
                    size: "{{ $image->filesize }}"
                });
            @endforeach
        @endif
        @if (isset($iconImage))
            @foreach ($iconImage as $image)
                savedIconImage.push({
                id: "{{ $image->id }}",
                name: "{{ $image->filename }}",
                url: "{{ $image->path }}",
                size: "{{ $image->filesize }}"
            });
        @endforeach
        @endif
    </script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzoneOne", {
            url: '{{ route('api.module.addImages', ['singleModule' => $module->id, 'zone' => 'module_gallery']) }}',
            autoProcessQueue: true,
            acceptedFiles : 'image/*',
            init: function () {
                var self = this;
                this.deleteTheFile = function (file) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('api.module.unlink', $module->id) }}',
                        data: {fileId: file.id, _token: '{{ csrf_token() }}'},
                        success: function(data) {
                            self.removeFile(file);
                        }
                    });
                };
                if (typeof savedGalleryImages !== 'undefined' && Array.isArray(savedGalleryImages)) {
                    savedGalleryImages.forEach(function (savedImage) {
                        var removeButton = Dropzone.createElement("<button class='button small' style='margin-top: 10px'>Remove file</button>");
                        self.options.addedfile.call(self, savedImage);
                        self.options.thumbnail.call(self, savedImage, savedImage.url);
                        savedImage.previewElement.classList.add('dz-complete');
                        savedImage.previewElement.appendChild(removeButton);
                        removeButton.addEventListener("click", function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            self.deleteTheFile(savedImage);
                        });
                    });
                }
            }
        });
    </script>
    <script>
        var myDropzone = new Dropzone(".dropzoneTwo", {
            url: '{{ route('api.module.addImages', ['singleModule' => $module->id, 'zone' => 'module_icon']) }}',
            autoProcessQueue: true,
            acceptedFiles : 'image/*',
            maxFiles: 1,
            init: function () {
                var self = this;
                this.deleteTheFile = function (file) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('api.module.unlink', $module->id) }}',
                        data: {fileId: file.id, _token: '{{ csrf_token() }}'},
                        success: function(data) {
                            self.removeFile(file);
                        }
                    });
                };
                if (typeof savedIconImage !== 'undefined' && Array.isArray(savedIconImage)) {
                    savedIconImage.forEach(function (savedImage) {
                        var removeButton = Dropzone.createElement("<button class='button small' style='margin-top: 10px'>Remove file</button>");
                        self.options.addedfile.call(self, savedImage);
                        self.options.thumbnail.call(self, savedImage, savedImage.url);
                        savedImage.previewElement.classList.add('dz-complete');
                        savedImage.previewElement.appendChild(removeButton);
                        removeButton.addEventListener("click", function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            self.deleteTheFile(savedImage);
                        });
                    });
                }
            }
        });
    </script>
@stop
