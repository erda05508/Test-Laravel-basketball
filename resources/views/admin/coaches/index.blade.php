@extends('layouts.app')

@section('content')
    <h3 class="page-title">Coaches</h3>
    @can('coach_create')
    <p>
        <a href="{{ route('admin.coaches.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($coaches) > 0 ? 'datatable' : '' }} @can('coach_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('coach_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>team</th>
                        <th>name</th>
                        <th>country</th>
                        <th>birth-date</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($coaches) > 0)
                        @foreach ($coaches as $coach)
                            <tr data-entry-id="{{ $coach->id }}">
                                @can('coach_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $coach->team->name or '' }}</td>
                                <td>{{ $coach->name }}</td>
                                <td>{{ $coach->country }}</td>
                                <td>{{ $coach->birth_date }}</td>
                                <td>
                                    @can('coach_view')
                                    <a href="{{ route('admin.coaches.show',[$coach->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('coach_edit')
                                    <a href="{{ route('admin.coaches.edit',[$coach->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('coach_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.coaches.destroy', $coach->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('coach_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.coaches.mass_destroy') }}';
        @endcan

    </script>
@endsection