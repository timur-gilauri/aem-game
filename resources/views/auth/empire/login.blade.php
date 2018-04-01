@extends('layouts.enter')

@section('header')
    <div class="line" style="display: flex;justify-content: space-between;align-content: center;">
        <span>Здорова, салага!</span>
        <a href="{{route('register')}}" class="button" style="margin: 0;display: flex;align-self: center;">Зарегистрироваться</a>
    </div>
@endsection

@section('form')
    <form class="form" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="login"
                       class="col-sm-4 col-form-label text-md-right">Логин</label>

                <div class="col-md-6">
                    <input id="login"
                           type="text"
                           class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}"
                           name="login"
                           value="{{ old('login') }}"
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
                <label for="password"
                       class="col-md-4 col-form-label text-md-right">Пароль</label>

                <div class="col-md-6">
                    <input id="password"
                           type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Войти
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Забыли пароль
                    </a>
                </div>
            </div>
        </form>
@endsection
