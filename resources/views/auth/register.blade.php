@extends('layouts.enter')

@section('header')
    <div class="line d-flex align-content-center">
        <span class="mr-auto">Здорова, салага!</span>
        <a href="{{route('login')}}" class="button ml-auto mr-0">Войти</a>
    </div>
@endsection

@section('form')

    @include('blocks.errors')

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="login" class="col-md-4 col-form-label text-md-right">Логин</label>

            <div class="col-md-6">
                <input id="login"
                       type="text"
                       class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}"
                       name="login"
                       value="{{ old('login') }}"
                       placeholder="Логин"
                       required
                       autofocus>

                @if ($errors->has('login'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email"
                   class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password"
                   class="col-md-4 col-form-label text-md-right">{{__('messages.password')}}</label>

            <div class="col-md-6">
                <input id="password"
                       type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password"
                       placeholder="Пароль"
                       required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                   class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

            <div class="col-md-6">
                <input id="password-confirm"
                       type="password"
                       class="form-control"
                       name="password_confirmation"
                       placeholder="Подтвердите пароль"
                       required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Зарегистрироваться
                </button>
            </div>
        </div>
    </form>
@endsection
