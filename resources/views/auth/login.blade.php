@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="col-12"><h1>Вход</h1></div>
    <div class="col-12" style="padding: 15px;">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-form-label col-md-2 col-xs-2">Email</label>

                <div class="col-md-5 col-xs-10">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-form-label col-md-2 col-xs-2">Пароль</label>

                <div class="col-md-5 col-xs-10">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-form-label col-md-3 col-xs-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Запомнить меня
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Войти</button>
        </form>
    </div>
</div>
@endsection
