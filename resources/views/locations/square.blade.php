@extends('layouts.main', ['title' => $location_name])

@section('content')
    <div class="line">На площади вы можете найти все что вам нужно.</div>
@endsection

@section('locations')
    @foreach($locations as $location)
        <a class="line_interact" href="{{route($location->name)}}" title="{{$location->name_ru}}">
            <i class="fi-torsos-all icon"></i>{{$location->name_ru}}</a>
    @endforeach
@endsection
