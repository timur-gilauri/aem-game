@extends('layouts.main', ['title' => $location_name])

@section('content')
    <div class="item__lst clearfix small-up-2 medium-up-3 large-up-3">
        @foreach(App\Armor::all() as $item)
            {!! view('blocks.armor-item', ['armor'=>$item, 'player'=>$player,'tradeAction' => 'buy'])->render() !!}
        @endforeach
    </div>
@endsection
