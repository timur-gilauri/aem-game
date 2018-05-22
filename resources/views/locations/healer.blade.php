@extends('layouts.app', ['title' => $title])

@section('content')
    <div class="line">Здесь вы можете купить зелья и яды.</div>

    @if($items->count())
        <div class="item__lst row">

            @foreach($items as $elixir)
                @include('blocks.elixir-item', ['elixir'=>$elixir, 'player'=>$player,'tradeAction' => 'buy'])
            @endforeach

        </div>
    @else
        <div class="base-block-padding font-weight-bold">Пока у лекаря нет зеллий на продажу</div>
    @endif
    @include('blocks.locations')
@endsection
