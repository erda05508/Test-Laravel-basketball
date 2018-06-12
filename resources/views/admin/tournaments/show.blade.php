@extends('layouts.app')

@section('content')
    <h3 class="page-title">Турниры</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Названия турнира</th>
                            <td>{{ $tournament->title }}</td>
                        </tr>
                        <tr>
                            <th>Сезон</th>
                            <td>{{ $tournament->season }}</td>
                        </tr>
                        <tr>
                            <th>Число команд</th>
                            <td>{{ $tournament->number_of_teams }}</td>
                        </tr>
                        <tr>
                            <th>Kоманд</th>
                            <td>{{ $tournament->teams()->pluck('name')->implode(', ') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tournaments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop