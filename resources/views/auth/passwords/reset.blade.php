@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header navbar-dark bg-dark text-white">{{ __('Восстановить пароль') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">{{ __('E-Mail Адресс') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="password">{{ __('Пароль') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm">{{ __('Подвердите Пароль') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Сохранить новый пароль') }}
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
