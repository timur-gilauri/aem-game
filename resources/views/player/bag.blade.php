@extends("layouts.main", ['title'=>'Сумка'])

@section('content')
    <div class="line empty-bag-message" style="display: none;">Ваша сумка пока еще пуста. Прогуляйтесь по площади, там
        вы сможете купить много полезных вещей.
    </div>
    @if(count($elixirs) > 0)
        <div class="item__lst clearfix small-up-2 medium-up-3 large-up-3">
            @foreach($elixirs as $elixir)
                <div class="column item__lst__i">
                    <div class="item__lst__i__inner">
                        <span class="amount">{{$elixir->amount}}</span>
                        <img class="item-img" src="{{url('/')}}/i/items/elixir.jpg" height="60"/>
                        <div class="item-info">
                            <div class="name">{{$elixir->name}}</div>
                            <div class="effect">{{$elixir->description}}</div>
                        </div>
                        <button class="button use-item" data-item-id="{{$elixir->id}}" data-item-type="elixirs"
                                data-item-id="{{$elixir->id}}">Использовать
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="line empty-bag-message">Ваша сумка пока еще пуста. Прогуляйтесь по площади, там вы сможете купить
            много полезных вещей.
        </div>
    @endif

@endsection
