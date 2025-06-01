@extends('layouts.admin')
@section('content')
    @can('volunteer_task_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.volunteer-tasks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.volunteerTask.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.volunteerTask.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-VolunteerTask">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.volunteer') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.visit_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerTask.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.volunteer-tasks.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'volunteer_name',
                        name: 'volunteer.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'visit_type',
                        name: 'visit_type'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-VolunteerTask').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
