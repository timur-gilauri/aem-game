@extends('administrator.layouts.main', ['title' => 'Страницы'])

@section('content')

    @include('administrator.blocks.create-item-button', ['page' => 'pages', 'text'=> 'Добавить страницу'])

    @include('administrator.blocks.session-message')

    <div class="container-fluid">
        <table class="table table-items">
            @include('administrator.blocks.table-head', ['columns' => ['Название', 'Приоритет', 'Статус']])

            <tbody>
            @foreach($items as $item)
                @include('administrator.pages.item', compact('item'))
            @endforeach
            </tbody>
        </table>
    </div>


@endsection