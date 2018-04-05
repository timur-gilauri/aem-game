<div class="col-sm-4 item__lst__i" data-trade-action="{{--{{$tradeAction}}--}}">
    <div class="item__lst__i__inner">
        <img class="item-img" src="{{url('/images/items/elixir.jpg')}}" height="60"/>
        <div class="item-info">
            <div class="name">{{$elixir->getTitle()}}</div>
            {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
        </div>
        <button class="button trade-item" data-trade-operation="buy" data-item-type="elixirs"
                data-item-id="{{$elixir->getId()}}"
                data-price="{{$elixir->getPrice()}}"
                {{$player->getMoney() >= $elixir->getPrice() ?: 'disabled style=cursor:not-allowed title="У&nbsp;вас не достаточно денег.'}}>{{$elixir->getPrice()}}
            <strong><s>X</s></strong></button>
    </div>
</div>