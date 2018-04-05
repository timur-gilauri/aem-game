<div class="sticky-container">
    <div class="line top-line">
        @if(request()->route()->getName() == 'home')
            <div class="player-info_name">{{$player->getName()}}</div>
        @else
            <a href="{{route('home')}}" class="get-home">На главную</a>
        @endif
        <div class="player_stats-inline" id="player-stats">
            @include('blocks.player-stats')
        </div>
    </div>
</div>