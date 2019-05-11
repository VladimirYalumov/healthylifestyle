@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12"><h1>Регистрация</h1></div>
    <div class="col-12" style="padding: 15px;">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-form-label col-md-2 col-xs-2">Email</label>

                <div class="col-md-5 col-xs-10">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group row">
                <label for="password" class="col-form-label col-md-2 col-xs-2">Пароль</label>

                <div class="col-md-5 col-xs-10">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-form-label col-md-2 col-sm-12">Повторите пароль</label>

                <div class="col-md-5 col-sm-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="sex_radio" class="col-form-label col-md-2 col-sm-12">Пол</label>

                <div class="col-md-3 col-sm-12 btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="radio" name="sex" id="option1" value="male" checked>Муж
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="sex" id="option2" value="female">Жен
                    </label>
                </div>
            </div>

            <input name="name" type="hidden" value="test">
            <button type="submit" class="btn btn-dark">Зарегистрироваться</button>
        </form>
    </div>
</div>
@endsection
