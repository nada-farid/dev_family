@extends('layouts.admin')
@section('content')
@can('value_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.values.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.value.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.value.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Value">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.value.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.value.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.value.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.value.fields.beneficiar') }}
                        </th>
                        <th>
                            {{ trans('cruds.value.fields.icon') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($values as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $value->id ?? '' }}
                            </td>
                            <td>
                                {{ $value->title ?? '' }}
                            </td>
                            <td>
                                {{ $value->description ?? '' }}
                            </td>
                            <td>
                                {{ $value->beneficiar ?? '' }}
                            </td>
                            <td>
                                @if($value->icon)
                                    <a href="{{ $value->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $value->icon->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('value_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.values.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('value_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.values.edit', $value->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('value_delete')
                                    <form action="{{ route('admin.values.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('value_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.values.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Value:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection