<div class="col-6 col-sm-4 item__lst__i">
    <div class="item__lst__i__inner">
        <img class="item-img" src="{{url('/images/items/elixir.jpg')}}" height="60"/>
        <div class="item-info">
            <div class="name">{{$elixir->getTitle()}}</div>
            {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
        </div>
        <a href="{{route('market::buy-item', ['type' => 'elixir', 'operation'=> 'buy', 'id' => $elixir->getId(),])}}"
           class="btn btn-primary trade-item {{$player->getMoney() <= $elixir->getPrice() ? 'disabled':''}}">{{$elixir->getPrice()}}
            <strong><s>X</s></strong></a>
    </div>
</div>