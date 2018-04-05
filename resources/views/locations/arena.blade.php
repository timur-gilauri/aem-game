@extends('layouts.main', ['title' => $location_name])

@section('fights-result')
    <section>
        <div class="line">
            <h3 class="message" id="arena_message">Сражайся щенок!</h3>
        </div>
    </section>
@endsection

@section('content')
    <div class="players__lst" id="enemy_lst">
        <?=view('blocks.player')->with('player', $enemy)->with('attackBtn', true)->render();?>
    </div>
@endsection

@section('locations')
    @foreach($locations as $location)
        <a class="line_interact" href="{{route($location->name)}}" title="{{$location->name_ru}}">
            <i class="fi-torsos-all icon"></i>{{$location->name_ru}}</a>
    @endforeach
@endsection
