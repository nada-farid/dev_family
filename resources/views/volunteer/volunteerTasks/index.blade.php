@extends('layouts.volunteer')
@section('content')
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

    <!-- Modal -->
    <div class="modal fade" id="finish_task" tabindex="-1" aria-labelledby="finish_taskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finish_taskLabel">انهاء المهمة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('volunteer.volunteer-tasks.finish') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.volunteerTask.fields.notes') }}</label>
                            <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if ($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.volunteerTask.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="files">{{ trans('cruds.volunteerTask.fields.files') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}"
                                id="files-dropzone">
                            </div>
                            @if ($errors->has('files'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('files') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.volunteerTask.fields.files_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        var uploadedFilesMap = {}
        Dropzone.options.filesDropzone = {
            url: '{{ route('volunteer.volunteer-tasks.storeMedia') }}',
            maxFilesize: 4, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
                uploadedFilesMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFilesMap[file.name]
                }
                $('form').find('input[name="files[]"][value="' + name + '"]').remove()
            }, 
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        function edit_volunteer_task(id) {
            $('#finish_task').modal('show');
            $('#id').val(id);
        }

        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('volunteer.volunteer-tasks.index') }}",
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
