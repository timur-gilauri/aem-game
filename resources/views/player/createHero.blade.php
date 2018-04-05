@extends('layouts.main')
@section('content')
    <div class="player">
        <div class="player-img">
            <img src="{{url('/').$player->gender->image}}" width=""/>
        </div>
        <div class="player-info">
            <div class="player-title">{{$player->name}}</div>
            @foreach(App\Player::$chars as $char=>$title)
                <div class="player-stat"><i class="icon fi-info"></i>{{$title}}
                    : {{$char == 'nation' ? $player->nation->name : $player[$char]}}</div>
            @endforeach
        </div>
    </div>
@endsection