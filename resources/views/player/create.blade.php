@extends('layouts.base')

@section('content')
    <div class="line">{{$title ?? 'Создай своего героя!'}}</div>

    @include('blocks.errors')

    <form class="form create-player" action="{{route('player::save')}}" method="post">
        @csrf

        <div class="create-player__name-block">
            <img id="player-image"
                 class="create-player__name-block__img"
                 src="{{asset('images/classes/army/unknown.jpg')}}"
                 data-path="{{asset('images/classes/army/')}}">
            <div class="form-group">
                <label for="name">Имя персонажа</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       placeholder="Имя персонажа">
            </div>
        </div>

        <hr/>

        <h2 class="md-3">Выберите класс:</h2>
        <div class="form-group row justify-content-around no-gutters">
            @foreach($playerClasses as $playerClass)
                <label for="player-class-{{$playerClass->getId()}}"
                       class="create-player__label text-center">

                    <input id="player-class-{{$playerClass->getId()}}"
                           class="create-player__checkbox"
                           type="radio"
                           name="player_class_id"
                           {{ old('player_class_id') ? 'checked' : '' }}
                           value="{{$playerClass->getId()}}">

                    <img class="create-player__img mb-2"
                         src="{{$playerClass->getImage()->url()}}"
                         alt="{{$playerClass->getTitle()}}">

                    {{$playerClass->getTitle()}}
                </label>
            @endforeach
        </div>

        <hr/>

        <h2 class="mb-3">Выберите государство:</h2>
        <div class="form-group row justify-content-around no-gutters" id="countries-list">
            @foreach($countries as $country)
                <label for="country-{{$country->getId()}}"
                       class="create-player__label text-center">

                    <input id="country-{{$country->getId()}}"
                           class="create-player__checkbox"
                           type="radio"
                           name="country_id"
                           {{ old('country_id') ? 'checked' : '' }}
                           value="{{$country->getId()}}"
                           data-title="{{$country->getTitle()}}"
                           onchange="changeState()">

                    <img class="create-player__img mb-2"
                         src="{{$country->getImage()->url()}}"
                         data-src="{{$country->getImage()->url()}}"
                         data-shadow-src="{{$country->getImageShadowed()->url()}}"
                         alt="{{$country->getTitle()}}">
                    {{$country->getTitle()}}

                </label>
            @endforeach
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Создать
                </button>
            </div>
        </div>

    </form>

    <script>
        function changeState() {
            let checkboxes = [...document.querySelectorAll('#countries-list input')];
            checkboxes.forEach(checkbox => changeImage(checkbox));
        }

        function changeImage(checkbox) {
            let countryTitle = checkbox.dataset['title'];
            let image = checkbox.parentElement.querySelector('img');
            let playerImage = document.querySelector('#player-image');

            image.setAttribute('src', checkbox.checked ? image.dataset['shadowSrc'] : image.dataset['src']);

            if (checkbox.checked) {
                playerImage.setAttribute('src', playerImage.dataset['path'] + '/' + countryTitle + '.jpg');
            }
        }
    </script>
@endsection