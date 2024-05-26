@extends('layouts.app')

@section('content')
    <div class="navbar-registrer">
        <div class="navbar-registration-title">Зарегистрировать</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="registration">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3 pt-4">
                        <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Имя">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="surname" type="text" class="form-control" @error('surname') is-invalid @enderror"
                            name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                            placeholder="Фамилия">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="patronymic" type="text" class="form-control"
                            @error('patronymic') is-invalid @enderror" name="patronymic" value="{{ old('patronymic') }}"
                            required autocomplete="patronymic" placeholder="Отчество">
                        @error('patronymic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="login" type="text" class="form-control" @error('login') is-invalid @enderror"
                            name="login" value="{{ old('login') }}" required autocomplete="login" placeholder="Логин">
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Пароль">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Повторите пароль">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="role_id" id="role_id">
                            <option selected>Выберите права</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="point_id" id="point_id">
                            <option selected>Выберите локацию</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        @error('point_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="registration-submit">
                                Зарегистрировать
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
