@extends('layouts.app')

@section('content')

    @foreach($locations as $location)
        @if($player->getId() >= $location->getAvailableAtLevel())
            <a class="line_interact"
               href="{{route('location', $location->getTitle())}}" title="{{$location->getName()}}"><i
                        class="fi-torsos-all icon"></i>{{$location->getName()}}</a>
        @else
            <div class="line disabled"><i class="fi-torsos-all icon"></i>{{$location->getName()}}</div>
        @endif
    @endforeach
@endsection
