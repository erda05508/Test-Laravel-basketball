@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Standings Table</h1>

                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Team</th>
                        <th>Won</th>
                        <th>Lost</th>
                        <th>Points</th>
                    </tr>

                    @forelse($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->won }}</td>
                            <td>{{ $team->lost }}</td>
                            <td>{{ $team->points }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No teams.</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Standings Table</h1>

                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Team</th>
                        <th>Игры</th>
                        <th>Очки</th>
                        <th>2 очковые</th>
                        <th>3 очковые</th>
                        <th>Штрафные</th>
                        <th>Передачи</th>
                        <th>Подборы</th>
                        <th>Перехваты</th>
                        <th>Потери</th>
                        <th>Фолы</th>
                    </tr>


                    @forelse($teams as $team)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->games }}</td>
                            <td>{{ $team->stat('result') }}</td>
                            <td>{{ $team->stat('g2point') }}</td>
                            <td>{{ $team->stat('g3point') }}</td>
                            <td>{{ $team->stat('fine') }}</td>
                            <td>{{ $team->stat('transfers') }}</td>
                            <td>{{ $team->stat('rebounds') }}</td>
                            <td>{{ $team->stat('interceptions') }}</td>
                            <td></td>
                            <td>{{ $team->stat('fouls') }}</td>
                        </tr>

                    @empty

                    @endforelse

                </table>

            </div>
        </div>

<div class="row">
            <div class="col-md-12">
                <h1>Standings Table</h1>

                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Team</th>
                        <th>Игры</th>
                        <th>Очки</th>
                        <th>2 очковые</th>
                        <th>3 очковые</th>
                        <th>Штрафные</th>
                        <th>Передачи</th>
                        <th>Подборы</th>
                        <th>Перехваты</th>
                        <th>Потери</th>
                        <th>Фолы</th>
                    </tr>


                    @forelse($teams as $team)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->games }}</td>
                            <td>{{ $team->statis('result') }}</td>
                            <td>{{ $team->statis('g2point') }}</td>
                            <td>{{ $team->statis('g3point') }}</td>
                            <td>{{ $team->statis('fine') }}</td>
                            <td>{{ $team->statis('transfers') }}</td>
                            <td>{{ $team->statis('rebounds') }}</td>
                            <td>{{ $team->statis('interceptions') }}</td>
                            <td></td>
                            <td>{{ $team->statis('fouls') }}</td>
                        </tr>

                    @empty

                    @endforelse

                </table>

            </div>
        </div>


    </div>
@endsection
