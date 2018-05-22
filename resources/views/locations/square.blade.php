@extends('layouts.app', ['title' => $title])

@section('content')
    <div class="line">На площади вы можете найти все что вам нужно.</div>


    @foreach($items as $location)
        <a class="line_interact" href="{{route('location', $location->getSlug())}}" title="{{$location->getTitle()}}">
            <i class="fi-torsos-all icon"></i>{{$location->getTitle()}}</a>
    @endforeach
@endsection
