@extends('layouts.admin')
@section('content')
@can('volunteer_guide_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.volunteer-guides.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.volunteerGuide.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.volunteerGuide.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VolunteerGuide">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.volunteerGuide.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerGuide.fields.published') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerGuide.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.volunteerGuide.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($volunteerGuides as $key => $volunteerGuide)
                        <tr data-entry-id="{{ $volunteerGuide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $volunteerGuide->id ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $volunteerGuide->published ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $volunteerGuide->published ? 'checked' : '' }}>
                            </td>
                            <td>
                                @if($volunteerGuide->file)
                                    <a href="{{ $volunteerGuide->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $volunteerGuide->title ?? '' }}
                            </td>
                            <td>
                                @can('volunteer_guide_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.volunteer-guides.show', $volunteerGuide->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('volunteer_guide_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.volunteer-guides.edit', $volunteerGuide->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('volunteer_guide_delete')
                                    <form action="{{ route('admin.volunteer-guides.destroy', $volunteerGuide->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('volunteer_guide_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.volunteer-guides.massDestroy') }}",
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
    pageLength: 50,
  });
  let table = $('.datatable-VolunteerGuide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection