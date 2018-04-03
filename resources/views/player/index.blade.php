@extends('layouts.app')

@section('content')
    <div class="line">{{$player->getName()}}</div>

    <div class="player-stats">
        <img class="player-stats__img"
             src="{{asset('images/classes/army/'.$player->getCountry()->getTitle().'.jpg')}}">
        <div class="geography-stats">
            <div class="stat-line">
                <div class="stat-line__name">Страна</div>
                <div class="stat-line__value">{{$player->getCountry()->getName()}}</div>
            </div>
            <div class="stat-line">
                <div class="stat-line__name">Город</div>
                <div class="stat-line__value">{{$player->getCity()->getName()}}</div>
            </div>
        </div>
    </div>



@endsection