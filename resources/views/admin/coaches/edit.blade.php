@extends('layouts.app')

@section('content')
    <h3 class="page-title">Тренерский состав</h3>
    
    {!! Form::model($coach, ['method' => 'PUT', 'route' => ['admin.coaches.update', $coach->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('team_id', 'Team', ['class' => 'control-label']) !!}
                    {!! Form::select('team_id', $teams, old('team_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('team_id'))
                        <p class="help-block">
                            {{ $errors->first('team_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
                    {!! Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country'))
                        <p class="help-block">
                            {{ $errors->first('country') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('birth_date', 'Birth date', ['class' => 'control-label']) !!}
                    {!! Form::text('birth_date', old('birth_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('birth_date'))
                        <p class="help-block">
                            {{ $errors->first('birth_date') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop