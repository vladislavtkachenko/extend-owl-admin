<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Авторизация</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('vendor/vladislavtkachenko/css/auth/login.css') }}">
    </head>
    <body>
        <div class="flex-center full-height">
            <div class="authorization">
                <div class="authorization__inner">
                    <div class="authorization__tabs">
                        <a>Авторизация</a>
                    </div>
                    <div class="authorization__inputForm-wrapper">
                        <form class="authorization__inputForm-form" method="POST" action="/{{config('sleeping_owl.url_prefix', 'admin')}}/login">
                            {{ csrf_field() }}

                            <input id="email" type="email" class="input-form__inputText" placeholder="Ваш email" name="email" value="{{ old('email') }}" required autofocus>
                            <input id="password" type="password" class="input-form__inputText" placeholder="Ваш пароль" name="password" required>

                            @if (isset($errors) && count($errors->all()) > 0 )
                                <div class="input-form__alert input-form__alert_danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="input-form__buttons">
                                <div class="checkbox">
                                    <label class="i-checks">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <i></i>
                                        Запомнить меня
                                    </label>
                                </div>
                                <button type="submit" class="mainButton">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>