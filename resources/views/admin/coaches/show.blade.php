@extends('layouts.app')

@section('content')
    <h3 class="page-title">Тренеры</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.coaches.fields.team')</th>
                            <td>{{ $coach->team->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coaches.fields.name')</th>
                            <td>{{ $coach->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coaches.fields.country')</th>
                            <td>{{ $coach->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.coaches.fields.birth-date')</th>
                            <td>{{ $coach->birth_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.coaches.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop