@extends('layouts.master')

@section('content-header')
    <h1 class="pull-left">
        Documentation
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p style="margin-top: 20px;">
                <a href="" class="btn btn-primary btn-flat jsUpdateDocs"><i class="fa fa-refresh"></i> Update docs</a>
            </p>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $( document ).ready(function() {
            $('.jsUpdateDocs').on('click',function (event) {
                event.preventDefault();
                var $self = $(this);
                $self.find('i').toggleClass('fa-spin');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.docs.refresh') }}',
                    data: {_token: '{{ csrf_token() }}'},
                    success: function() {
                        $self.find('i').toggleClass('fa-spin');
                    }
                });
            });
        });
    </script>
@stop
