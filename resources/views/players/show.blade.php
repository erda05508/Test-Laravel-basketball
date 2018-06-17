@extends('layouts.front')

@section('content')

    <div class="container main-profile" style="padding: 10px 30px; background-color: #fafafa;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(empty($avatar))
                <img src="/uploads/avatars/{{ $player->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right: 25px;">
                @endif
                    <h1 style="font-size: 14px; font-weight: bold;">{{ $player->name }}'s profile</h1>
                <form enctype="multipart/form-data" action="/players/profile/{{ $player->id }}" method="POST">
                    <label style="font-size: 12px;">Обновить свой профиль</label>
                    <input type="file" name="player_avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                    <br><label for="">{{ $player->birth_date }}</label>
                    <br><label for="">{{ $player->tall }}</label>
                    <br><label for="">{{ $player->weight }}</label>
                </form>


            </div>
        </div>
    </div>
@endsection