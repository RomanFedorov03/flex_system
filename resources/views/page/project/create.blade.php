@extends('layouts.app')
@section('title', __('Добавить проект'))
@section('content')
    <div class="container">
        @if( old('error') != '')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ошибка!</strong> {{old('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{__('Добавить проект')}}</h4>
        </div>
        <form class="row g-3 ca" method="POST" action="{{route('projects.projects_create')}}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                <h5 class="h5">{{__('Информация о проекте')}}</h5>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autocomplete="off" required>
                <label for="name">{{__('Название проекта')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <select class="form-select" id="client" name="client" aria-label="{{__('Выберите клента')}}" required>
                    @foreach($user->clients as $client)
                        <option value="{{$client->id}}">{{$client->surname}} {{$client->name}} {{$client->patronymic}}</option>
                    @endforeach
                </select>
                <label for="client">{{__('Клиент')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <select class="form-select" id="responsible" name="responsible" aria-label="{{__('Выберите ответственного за проект')}}" required>
                    @foreach($user->staff as $staff)
                        <option value="{{$staff->id}}">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</option>
                    @endforeach
                </select>
                <label for="responsible">{{__('Ответственный')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="date" class="form-control" name="startDate" value="{{ old('startDate') }}" id="startDate" required>
                <label for="startDate">{{__('Начало проекта')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="date" class="form-control" name="endDate" value="{{ old('endDate') }}" id="endDate" required>
                <label for="endDate">{{__('Финал проекта')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" autocomplete="off">
                <label for="address">{{__('Страна, город')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="figma" value="{{ old('figma') }}" id="figma">
                <label for="figma">{{__('Figma')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="projectUrl" value="{{ old('projectUrl') }}" id="projectUrl">
                <label for="projectUrl">{{__('Ссылка на проект')}}</label>
            </div>
            <div class="form-floating col-md-4 mb-3">
                <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" id="contact">
                <label for="contact">{{__('Контактное лицо от заказчика')}}</label>
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
