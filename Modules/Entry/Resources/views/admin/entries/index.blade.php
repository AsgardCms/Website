@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('entry::entries.title.entries') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('entry::entries.title.entries') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="" class="btn btn-primary btn-flat" style="padding: 4px 10px;" data-toggle="modal" data-target="#sendInvite">
                        <i class="fa fa-paper-plane"></i> Send new invite batch
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>Email</th>
                            <th>Accepted</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($entries)): ?>
                        <?php foreach ($entries as $entry): ?>
                        <tr>
                            <td>
                                {{ $entry->created_at }}
                            </td>
                            <td>
                                {{ $entry->email }}
                            </td>
                            <td>
                                {{ $entry->accepted ? 'yes' : 'no' }}
                            </td>
                            <td>
                                <?php if (! $entry->accepted ): ?>
                                    <a href="{{ route('admin.entry.entry.invite', [$entry->email]) }}" class="btn btn-success btn-flat">Invite</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>Email</th>
                            <th>Accepted</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="sendInvite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {!! Form::open(['route' => 'admin.entry.entry.batch-invite', 'method' => 'post']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Send new invite emails</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" value="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    <?php $locale = App::getLocale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                },
                "columns": [
                    null,
                    null,
                    null,
                    { "sortable": false }
                ]
            });
        });
    </script>
@stop
