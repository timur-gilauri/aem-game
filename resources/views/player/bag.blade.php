<?php
$tabs = [
    [
        'id'           => 'elixir',
        'tabName'      => 'Эликсиры',
        'items'        => $player->getBag()->getElixirs(),
        'emptyTabText' => 'В вашей сумке нет эликсиров. Прогуляйтесь по площади, там вы сможете купить много полезных вещей.'
    ],
    [
        'id'           => 'weapon',
        'tabName'      => 'Оружие',
        'items'        => $player->getBag()->getWeapons(),
        'emptyTabText' => 'В вашей сумке нет оружия. Прогуляйтесь по площади, там вы сможете купить много полезных вещей.'
    ],
    [
        'id'           => 'armor',
        'tabName'      => 'Броня',
        'items'        => $player->getBag()->getArmors(),
        'emptyTabText' => 'В вашей сумке нет брони. Прогуляйтесь по площади, там вы сможете купить много полезных вещей.'
    ],
];

?>

@extends("layouts.app", ['title'=>'Сумка'])

@section('content')
    @if($player->getBag()->empty())
        <div class="line empty-bag-message">Ваша сумка пока еще пуста. Прогуляйтесь по площади, там
            вы сможете купить много полезных вещей.
        </div>
    @endif

    <ul class="nav nav-pills mb-3 base-block-padding player-stats__tabs" id="pills-tab" role="tablist">
        @foreach($tabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{$tab['id'] == 'elixir' ? 'active' : ''}}"
                   id="{{$tab['id']}}-tab"
                   data-toggle="pill"
                   href="#pills-{{$tab['id']}}"
                   role="tab"
                   aria-controls="pills-{{$tab['id']}}"
                   aria-selected="true">{{$tab['tabName']}}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content player-tabs-content base-block-padding pl-0 pr-0">
        @foreach($tabs as $tab)
            <div class="tab-pane fade show {{$tab['id'] == 'elixir' ? 'active' : ''}}"
                 id="pills-{{$tab['id']}}"
                 role="tabpanel"
                 aria-labelledby="{{$tab['id']}}-tab">
                @if($tab['items']->count())
                    <div class="row item__lst">
                        @foreach($tab['items'] as $bagItem)
                            <div class="col-6 col-sm-4 item__lst__i">
                                <div class="item__lst__i__inner">
                                    <span class="amount">{{$bagItem->getAmount()}}</span>
                                    <img class="item-img" src="{{$bagItem->getItem()->getImage()->url()}}" height="60"/>
                                    <div class="item-info">
                                        <div class="name">{{$bagItem->getItem()->getTitle()}}</div>
                                        {{--<div class="effect">{{$elixir->getDescription()}}</div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="base-block-padding font-weight-bold">{{$tab['emptyTabText']}}</div>
                @endif
            </div>
        @endforeach
    </div>

@endsection
