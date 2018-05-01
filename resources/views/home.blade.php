@extends('layouts.app')

@section('content')
    <div class="locations-lst">
        @foreach($locations as $location)
            @if($player->getId() >= $location->getAvailableAtLevel())
                <a class="line_interact"
                   href="{{route('location', $location->getSlug())}}" title="{{$location->getTitle()}}"><i
                            class="fi-torsos-all icon"></i>{{$location->getTitle()}}</a>
            @else
                <div class="line disabled"><i class="fi-torsos-all icon"></i>{{$location->getTitle()}}</div>
            @endif
        @endforeach
    </div>
@endsection
