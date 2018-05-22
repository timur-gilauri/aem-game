<div class="col-6 col-sm-4 item__lst__i">
    <div class="item__lst__i__inner">
        <img class="item-img" src="{{$item->getImage()->url()}}" height="60"/>
        <div class="item-info">
            <div class="name">{{$item->getTitle()}}</div>
            {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
        </div>
        <a href="{{route('market::buy-item', ['type' => $itemsType, 'operation'=> 'buy', 'id' => $item->getId()])}}"
           class="btn btn-primary trade-item {{$player->getMoney() <= $item->getPrice() ? 'disabled':''}}">{{$item->getPrice()}}
            <strong><s>X</s></strong></a>
    </div>
</div>