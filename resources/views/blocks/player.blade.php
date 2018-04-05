<div class="player enemy_i">
    <div class="player-img">
        <img src="{{url('/').$player->gender->image}}" width=""/>
    </div>
    <div class="player-info">
        <div class="player-title">{{$player->name}}</div>
        @foreach(App\Player::$chars as $char=>$title)
            <div class="player-stat" data-stat="{{$char != 'nation' ? $char : 'nation_name'}}">
                <i class="icon fi-info @if($char != 'nation') @if($player[$char] > $player[$char])stronger @endif @if($player[$char] < $player[$char]) weaker @endif @endif "></i>
                <span>{{$title}}: {{$char == 'nation' ? $player->nation->name : $player[$char]}}</span>
            </div>
        @endforeach
        @if($attackBtn)
            <button class="button attack-btn"
                    type="button"
                    {{$player->health != 0 ?: 'disabled'}}
                    data-enemy-id="{{$player->id}}">Атаковать
            </button>
        @endif
    </div>
</div>