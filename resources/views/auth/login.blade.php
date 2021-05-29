@extends('layouts.app')

@section('content')
<div class="container vw-100 h-100">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header navbar-dark bg-dark text-white">{{ __('Вход') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">{{ __('E-Mail адрес') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">{{ __('Пароль') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row  mb-2">
                            <div class="col-md-6 user-select-none">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-end">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Войти') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
