@extends('layouts.app')

@section('content')
    <h3 class="page-title">Турниры</h3>
    @can('tournament_create')
    <p>
        <a href="{{ route('admin.tournaments.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tournaments) > 0 ? 'datatable' : '' }} @can('tournament_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('tournament_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>id</th>
                        <th>title</th>
                        <th>season</th>
                        <th>количество команд</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tournaments) > 0)
                        @foreach ($tournaments as $tournament)
                            <tr data-entry-id="{{ $tournament->id }}">
                                @can('tournament_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $tournament->id }}</td>
                                <td>{{ $tournament->title }}</td>
                                <td>{{ $tournament->season }}</td>
                                <td>{{ $tournament->number_of_teams }}</td>
                                <td>
                                    @can('tournament_view')
                                    <a href="{{ route('admin.tournaments.show',[$tournament->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tournament_edit')
                                    <a href="{{ route('admin.tournaments.edit',[$tournament->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tournament_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tournaments.destroy', $tournament->id])) !!}
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
        @can('tournament_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.tournaments.mass_destroy') }}';
        @endcan

    </script>
@endsection