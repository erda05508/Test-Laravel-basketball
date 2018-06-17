@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.games.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.games.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="wrap" style="width: 800px; margin: auto;">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('tournaments', 'Турнир', ['class' => 'control-label']) !!}
                        {!! Form::select('tournaments', $tournament, old('tournament'), ['class' => 'form-control select2']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('start_time'))
                            <p class="help-block">
                                {{ $errors->first('start_time') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-6 form-group">
                        {!! Form::label('team1_id', 'Team1', ['class' => 'control-label']) !!}
                        {!! Form::select('team1_id', $team1s, old('team1_id'), ['class' => 'form-control select2']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('team1_id'))
                            <p class="help-block">
                                {{ $errors->first('team1_id') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-6 form-group">
                        {!! Form::label('team2_id', 'Team2', ['class' => 'control-label']) !!}
                        {!! Form::select('team2_id', $team2s, old('team2_id'), ['class' => 'form-control select2']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('team2_id'))
                            <p class="help-block">
                                {{ $errors->first('team2_id') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('start_time', 'Start time', ['class' => 'control-label']) !!}
                        {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('start_time'))
                            <p class="help-block">
                                {{ $errors->first('start_time') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('result1', 'Result1', ['class' => 'control-label']) !!}
                        {!! Form::number('result1', old('result1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('result1'))
                            <p class="help-block">
                                {{ $errors->first('result1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('result2', 'Result2', ['class' => 'control-label']) !!}
                        {!! Form::number('result2', old('result2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('result2'))
                            <p class="help-block">
                                {{ $errors->first('result2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('g2point1', 'g2point1', ['class' => 'control-label']) !!}
                        {!! Form::number('g2point1', old('g2point1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('g2point1'))
                            <p class="help-block">
                                {{ $errors->first('g2point1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('g2point2', 'g2point2', ['class' => 'control-label']) !!}
                        {!! Form::number('g2point2', old('g2point2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('g2point2'))
                            <p class="help-block">
                                {{ $errors->first('g2point2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('g3point1', 'g3point1', ['class' => 'control-label']) !!}
                        {!! Form::number('g3point1', old('g3point1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('g3point1'))
                            <p class="help-block">
                                {{ $errors->first('g3_point1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('g3point2', 'g3point2', ['class' => 'control-label']) !!}
                        {!! Form::number('g3point2', old('g3point2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('g3point2'))
                            <p class="help-block">
                                {{ $errors->first('g3_point2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('fine1', 'fine1', ['class' => 'control-label']) !!}
                        {!! Form::number('fine1', old('fine1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('fine1'))
                            <p class="help-block">
                                {{ $errors->first('fine1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('fine2', 'fine2', ['class' => 'control-label']) !!}
                        {!! Form::number('fine2', old('fine2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('fine2'))
                            <p class="help-block">
                                {{ $errors->first('fine2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('transfers1', 'transfers1', ['class' => 'control-label']) !!}
                        {!! Form::number('transfers1', old('transfers1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('transfers1'))
                            <p class="help-block">
                                {{ $errors->first('transfers1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('transfers2', 'transfers2', ['class' => 'control-label']) !!}
                        {!! Form::number('transfers2', old('transfers2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('transfers2'))
                            <p class="help-block">
                                {{ $errors->first('transfers2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('rebounds1', 'rebounds1', ['class' => 'control-label']) !!}
                        {!! Form::number('rebounds1', old('rebounds1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('rebounds1'))
                            <p class="help-block">
                                {{ $errors->first('rebounds1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('rebounds2', 'rebounds2', ['class' => 'control-label']) !!}
                        {!! Form::number('rebounds2', old('rebounds2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('rebounds2'))
                            <p class="help-block">
                                {{ $errors->first('rebounds2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('interceptions1', 'interceptions1', ['class' => 'control-label']) !!}
                        {!! Form::number('interceptions1', old('interceptions1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('interceptions1'))
                            <p class="help-block">
                                {{ $errors->first('interceptions1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('interceptions2', 'interceptions2', ['class' => 'control-label']) !!}
                        {!! Form::number('interceptions2', old('interceptions2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('interceptions2'))
                            <p class="help-block">
                                {{ $errors->first('interceptions2') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('fouls1', 'fouls1', ['class' => 'control-label']) !!}
                        {!! Form::number('fouls1', old('fouls1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <span style="position: absolute;right: 0;top: 27px;font-size: 18px;">:</span>
                        <p class="help-block"></p>
                        @if($errors->has('fouls1'))
                            <p class="help-block">
                                {{ $errors->first('fouls1') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('fouls2', 'fouls2', ['class' => 'control-label']) !!}
                        {!! Form::number('fouls2', old('fouls2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('fouls2'))
                            <p class="help-block">
                                {{ $errors->first('fouls2') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop