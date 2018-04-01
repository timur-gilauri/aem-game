@extends('layouts.enter')

@section('header')
    <div class="line d-flex align-content-center">
        <span class="mr-auto">Здорова, салага!</span>
        <a href="{{route('register')}}" class="button ml-auto mr-0">Зарегистрироваться</a>
    </div>
@endsection

@section('form')

    @include('blocks.errors')

    <form class="form" role="form" method="POST" action="{{ route('login') }}">
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
            <label for="password"
                   class="col-md-4 col-form-label text-md-right">Пароль</label>

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
