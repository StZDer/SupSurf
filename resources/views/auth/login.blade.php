@extends('layouts.app')

@section('content')
    <div class="navbar-enter">
        <div class="navbar-enter-title">Войти</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="enter">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3 pt-4">
                        <input id="login" type="text" class="form-control" @error('login') is-invalid @enderror"
                            name="login" value="{{ old('login') }}" required autocomplete="login" placeholder="Логин">
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Пароль">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="enter-submit">
                                Войти
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
