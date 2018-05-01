@extends("layouts.app", ['title'=>'Сумка'])

@section('content')
    @if($player->getBag()->empty())
        <div class="line empty-bag-message">Ваша сумка пока еще пуста. Прогуляйтесь по площади, там
            вы сможете купить много полезных вещей.
        </div>
    @endif

    <ul class="nav nav-pills mb-3 base-block-padding player-stats__tabs" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="elixirs-tab" data-toggle="pill" href="#pills-elixirs" role="tab"
               aria-controls="pills-elixirs" aria-selected="true">Эликсиры</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="weapons-tab" data-toggle="pill" href="#pills-weapons" role="tab"
               aria-controls="pills-weapons" aria-selected="false">Оружие</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="armor-tab" data-toggle="pill" href="#pills-armor" role="tab"
               aria-controls="pills-armor" aria-selected="false">Броня</a>
        </li>
    </ul>

    <div class="tab-content player-tabs-content base-block-padding pl-0 pr-0">
        <div class="tab-pane fade show active" id="pills-elixirs" role="tabpanel" aria-labelledby="elixirs-tab">
            @if($player->getBag()->getElixir()->count())
                <div class="row item__lst">
                    @foreach($player->getBag()->getElixir() as $item)
                        <div class="col-6 col-sm-4 item__lst__i">
                            <div class="item__lst__i__inner">
                                <img class="item-img" src="{{url('/images/items/elixir.jpg')}}" height="60"/>
                                <div class="item-info">
                                    <div class="name">{{$item->getTitle()}}</div>
                                    {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="base-block-padding font-weight-bold">В вашей сумке нет эликсиров. Прогуляйтесь по площади,
                    там вы сможете купить много полезных вещей.
                </div>
            @endif
        </div>

        <div class="tab-pane fade" id="pills-weapons" role="tabpanel" aria-labelledby="weapons-tab">
            @if($player->getBag()->getWeapon()->count())
                <div class="row item__lst">
                    @foreach($player->getBag()->getWeapon() as $item)
                        <div class="col-6 col-sm-4 item__lst__i">
                            <div class="item__lst__i__inner">
                                <img class="item-img" src="{{url('/images/items/elixir.jpg')}}" height="60"/>
                                <div class="item-info">
                                    <div class="name">{{$item->getTitle()}}</div>
                                    {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="base-block-padding font-weight-bold">В вашей сумке нет эликсиров. Прогуляйтесь по площади,
                    там вы сможете купить много полезных вещей.
                </div>
            @endif
        </div>
        <div class="tab-pane fade" id="pills-armor" role="tabpanel" aria-labelledby="armor-tab">
            @if($player->getBag()->getArmor()->count())
                <div class="row item__lst">
                    @foreach($player->getBag()->getArmor() as $item)
                        <div class="col-6 col-sm-4 item__lst__i">
                            <div class="item__lst__i__inner">
                                <img class="item-img" src="{{url('/images/items/elixir.jpg')}}" height="60"/>
                                <div class="item-info">
                                    <div class="name">{{$item->getTitle()}}</div>
                                    {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="base-block-padding font-weight-bold">В вашей сумке нет эликсиров. Прогуляйтесь по площади,
                    там вы сможете купить много полезных вещей.
                </div>
            @endif
        </div>
    </div>

@endsection
