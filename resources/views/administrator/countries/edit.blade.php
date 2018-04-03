@extends('administrator.layouts.main', ['title' => $title ?? 'Новая страна'])

@section('content')
    @include('administrator.blocks.errors')
    @include('administrator.blocks.session-message')

    <div class="container-fluid">
        <form id="form" action="{{route('admin::countries::save')}}" enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{isset($item) ? $item->getId() : ''}}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               placeholder="Название"
                               required
                               value="{{isset($item) ? $item->getName() : ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
                               placeholder="Название"
                               required
                               value="{{isset($item) ? $item->getTitle() : ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea type="text"
                                  class="form-control"
                                  id="description"
                                  name="description"
                                  placeholder="Описание"
                                  rows="5"
                                  required>{{isset($item) ? $item->getDescription() : ''}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="arms">Герб</label>
                <input type="file" class="form-control" id="arms" name="arms" required/>
            </div>
            <div class="form-group">
                <label for="arms_shadow">Герб c тенью</label>
                <input type="file" class="form-control" id="arms_shadow" name="arms_shadow" required/>
            </div>

            @include('administrator.blocks.form-buttons', ['page' => 'countries'])

        </form>
    </div>
@endsection