@extends('layouts.app')
@section('title', __('Добавить клиента'))
@section('content')
    <div class="container">
        @if( old('error') != '')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ошибка!</strong> {{old('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{__('Добавить клиента')}}</h4>
        </div>
        <form class="row g-3 ca" method="POST" action="{{route('clients.clients_create')}}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                <h5 class="h5">{{__('Контактная информация')}}</h5>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">{{__('Фото')}}</label>
                <input class="form-control" type="file" name="photo" id="photo">
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                <label for="name">{{__('Имя')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" id="surname">
                <label for="surname">{{__('Фамилия')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="patronymic" value="{{ old('patronymic') }}" id="patronymic">
                <label for="patronymic">{{__('Отчество')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" id="birthdate">
                <label for="birthdate">{{__('День Рождения')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" id="phone" required>
                <label for="phone">{{__('Телефон')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
                <label for="email">{{__('Email Адресс')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="country" value="{{ old('country') }}" id="country">
                <label for="country">{{__('Страна')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city">
                <label for="city">{{__('Город')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address">
                <label for="address">{{__('Адресс')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="company" value="{{ old('company') }}" id="company">
                <label for="company">{{__('Название компании')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="number" class="form-control" name="contractSum" value="{{ old('contractSum') }}" id="contractSum">
                <label for="contractSum">{{__('Потенциальная сумма контракта')}}</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="{{__('Введите комментарий')}}" value="{{ old('comment') }}" name="comment" id="comment" style="height: 100px"></textarea>
                <label for="comment">{{__('Комментарий')}}</label>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-success btn-lg" type="submit">{{__('Добавить')}}</button>
            </div>
        </form>
    </div>
@endsection
