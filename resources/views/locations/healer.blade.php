@extends('layouts.app', ['title' => $title])

@section('content')
    <div class="item__lst row">
        @foreach($elixirs as $elixir)
            @include('blocks.elixir-item', ['elixir'=>$elixir, 'player'=>$player,'tradeAction' => 'buy'])
        @endforeach
    </div>
@endsection
