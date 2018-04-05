@extends('layouts.main', ['title' => $location_name])

@section('content')
    <div class="players__lst">
        @foreach(App\Player::all() as $player)
            <?=view('blocks.player')->with('player', $player)->with('attackBtn', false)->render();?>
        @endforeach
    </div>
@endsection
