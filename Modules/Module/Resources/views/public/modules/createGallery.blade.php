@extends('layouts.master')

@section('styles')
    {!! Theme::style('css/dropzone.min.css') !!}
@stop
@section('content')
    <section id="main" class="container">
        <header>
            <h2>Add images for {{ $module->packagist_url }}</h2>
        </header>
        <div class="row box row-box">
            <div class="2u">
                @include('profile::public.partials.sidebar')
            </div>
            <div class="10u content" id="app">
                <form action="" class="dropzone"></form>
            </div>
        </div>
    </section>

@stop

@section('scripts')
    {!! Theme::script('js/dropzone.js') !!}
    {!! Theme::script('js/jquery-ui.js') !!}
    <script>
        var savedImages = [];
        @if (isset($images))
            @foreach ($images as $image)
                savedImages.push({
                    id: "{{ $image->id }}",
                    name: "{{ $image->filename }}",
                    url: "{{ $image->path }}"
                });
            @endforeach
        @endif
    </script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            url: '{{ route('api.module.addImages', $module->id) }}',
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
                this.on("addedfile", function(file) {
                    var removeButton = Dropzone.createElement("<button>Remove file</button>");
                    removeButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        self.deleteTheFile(savedImage);
                    });
                    file.previewElement.appendChild(removeButton);
                });
                if (typeof savedImages !== 'undefined' && Array.isArray(savedImages)) {
                    savedImages.forEach(function (savedImage) {
                        var removeButton = Dropzone.createElement("<button>Remove file</button>");
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
