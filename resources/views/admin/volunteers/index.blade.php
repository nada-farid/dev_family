@extends('layouts.admin')
@section('content')
    @can('volunteer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.volunteers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.volunteer.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.volunteer.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Volunteer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.initiative_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.cv') }}
                        </th>
                        <th>
                            {{ trans('global.verify') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteer.fields.created_at') }}
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
                ajax: "{{ route('admin.volunteers.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'initiative_name',
                        name: 'initiative_name'
                    },
                    {
                        data: 'cv',
                        name: 'cv',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'approved',
                        name: 'approved'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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
            let table = $('.datatable-Volunteer').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
