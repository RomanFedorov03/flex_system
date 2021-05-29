@extends('layouts.app')

@section('content')
<div class="container vw-100 h-100">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header navbar-dark bg-dark text-white">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">{{ __('Имя') }}</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="name" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                            <label for="surname">{{ __('Фамилия') }}</label>
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            <label for="password-confirm">{{ __('Подтвердить пароль') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-end align-items-center">
                                <a class="me-2" href="">{{__('Войти')}}</a>
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Регистрация') }}
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
