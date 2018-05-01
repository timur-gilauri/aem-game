@if(isset($locations) && $locations)
    @foreach($locations as $location)
        <a class="line_interact" href="{{route('location', $location->getSlug())}}" title="{{$location->getTitle()}}">
            <i class="fi-torsos-all icon"></i>{{$location->getTitle()}}</a>
    @endforeach
@endif