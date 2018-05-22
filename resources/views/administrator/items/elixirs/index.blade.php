@extends('administrator.layouts.main', ['title' => 'Страны'])

@section('content')

    @include('administrator.blocks.create-item-button', ['page' => 'countries', 'text'=> 'Добавить страну'])

    @include('administrator.blocks.session-message')

    <div class="container-fluid">
        <table class="table table-items">
            @include('administrator.blocks.table-head', ['columns' => ['Название']])

            <tbody>
            @foreach($items as $item)
                @include('administrator.countries.item', compact('item'))
            @endforeach
            </tbody>
        </table>
    </div>


@endsection