<div class="sticky-container">
    <div class="player-stats__line line">
        @if(request()->route()->getName() == 'home')
            <div class="player-stats__name">{{$player->getName()}}</div>
        @else
            <a href="{{route('home')}}" class="get-home">На главную</a>
        @endif
        <div class="player-stats__block">
            @include('blocks.player-stats')
        </div>
    </div>
</div>