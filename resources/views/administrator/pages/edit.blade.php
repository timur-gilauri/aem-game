@extends('administrator.layouts.main', ['title' => $title ?? 'Новая страница'])

@section('content')
    @include('administrator.blocks.errors')
    @include('administrator.blocks.session-message')

    <div class="container-fluid">
        <form id="form" action="{{route('admin::pages::save')}}" enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{isset($item) ? $item->getId() : ''}}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Название страницы</label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
                               placeholder="Название страницы"
                               value="{{isset($item) ? $item->getTitle() : ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Описание страницы</label>
                        <input type="text"
                               class="form-control"
                               id="description"
                               name="description"
                               placeholder="Описание страницы"
                               value="{{isset($item) ? $item->getDescription() : ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="key_words">Ключевые слова</label>
                        <input type="text"
                               class="form-control"
                               id="key_words"
                               name="key_words"
                               placeholder="Ключевые слова"
                               value="{{isset($item) ? $item->getKeyWords() : ''}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="content">Контент</label>
                <textarea
                        class="form-control tinymce-textarea"
                        id="content"
                        name="content">{{isset($item) ? $item->getContent() : ''}}</textarea>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="priority">Приоритет</label>
                        <input type="number"
                               min="0"
                               class="form-control"
                               id="priority"
                               name="priority"
                               placeholder="Приоритет"
                               value="{{isset($item) ? $item->getPriority(): ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="status-on">
                            Включить
                            <input type="radio" class="form-control" id="status-on" name="status"
                                   value="1" {{isset($item) && $item->getStatus() ? 'checked': ''}}>
                        </label>
                        <label for="status-off">
                            Выключить
                            <input type="radio" class="form-control" id="status-off" name="status"
                                   value="0" {{isset($item) && !$item->getStatus() ? 'checked': ''}}>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>

        </form>
    </div>
@endsection