@extends('layouts.main', ['title' => 'Главная'])

@section('content')
    @foreach($locations as $location)
        @if($player->id >= $location->available_at_level)
            <a class="line_interact"
               href="{{route($location->name)}}" title="{{$location->name_ru}}"><i
                        class="fi-torsos-all icon"></i>{{$location->name_ru}}</a>
        @else
            <div class="line disabled"><i class="fi-torsos-all icon"></i>{{$location->name_ru}}</div>
        @endif
    @endforeach
@endsection

