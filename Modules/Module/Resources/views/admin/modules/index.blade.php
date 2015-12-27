@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('module::modules.title.modules') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('module::modules.title.modules') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.module.module.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('module::modules.button.create module') }}
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
                            <th>Status</th>
                            <th>Category</th>
                            <th>Packagist URI</th>
                            <th>Author</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($modules)): ?>
                        <?php foreach ($modules as $module): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.module.module.view', [$module->id]) }}">
                                    {{ $module->created_at }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.module.module.view', [$module->id]) }}">
                                    <?php if ($module->isInReview()): ?>
                                        <span class="label label-danger">Awaiting review</span>
                                    <?php else: ?>
                                        <span class="label label-default">W.I.P.</span>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.module.module.view', [$module->id]) }}">
                                    {{ $module->category->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.module.module.view', [$module->id]) }}">
                                    {{ $module->packagist_uri }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.module.module.view', [$module->id]) }}">
                                    {{ $module->user->present()->fullName }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.module.module.view', [$module->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>

                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Packagist URI</th>
                            <th>Author</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('module::modules.title.create module') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.module.module.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
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
                }
            });
        });
    </script>
@stop
