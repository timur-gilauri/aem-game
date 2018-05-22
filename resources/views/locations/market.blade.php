@extends('layouts.app', ['title' => $title])

@section('content')
    <div class="line">Покупай, не жалей.</div>

    @if($items->count())
        <div class="item__lst row">

            @foreach($items as $item)
                @include('blocks.market-item')
            @endforeach

        </div>
    @else
        <div class="base-block-padding font-weight-bold">Пока нет товаров на продажу</div>
    @endif
    @include('blocks.locations')
@endsection
