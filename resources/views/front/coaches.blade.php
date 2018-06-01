@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $team->name }}: Тренера</h1>

                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Birth date</th>
                    </tr>
                    @forelse($coaches as $coach)
                        <tr>
                            <td>{{ $coach->name . ' ' . $coach->country }}</td>
                            <td>{{ $coach->birth_date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No coaches.</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>
@endsection
