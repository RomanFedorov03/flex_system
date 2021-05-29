@extends('layouts.app')
@section('title', __($client->surname.' '.$client->name.' '.$client->patronymic))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{$client->surname}} {{$client->name}} {{$client->patronymic}}</h4>
        </div>
        <ul class="nav nav-pills mb-3 border-bottom pb-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Основная информация')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex row gutters-sm">
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($client->photo !== null)
                                        <img src="{{asset('files/image/client/'.$client->photo)}}" width="100%" alt="">
                                    @else
                                        <img src="{{asset('files/image/icons/basic-photo.svg')}}" width="100%" alt="">
                                    @endif
                                        <input type="file" name="photo" id="photo" class="d-none">
                                        <label class="btn btn-outline-secondary" for="photo">{{__('Изменить')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="mb-0">{{__('Instagram')}}</h6>
                                    </div>
                                    <div class="col-sm-6 text-secondary">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="mb-0">{{__('Telegram')}}</h6>
                                    </div>
                                    <div class="col-sm-6 text-secondary">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card mb-3">
                            <div class="card-body position-relative client-edit-body">
                                <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editClientContent(this)" data-id="{{$client->id}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Имя')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Отчество')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->patronymic}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Фамилия')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->surname}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->birthdate}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Телефон')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex flex-wrap">
                                    <div class="col-6 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">{{__('Email')}}</h6>
                                        </div>
                                        <div class="col-sm-6 text-end text-secondary">
                                            {{$client->email}}
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">{{__('Статус')}}</h6>
                                        </div>
                                        <div class="col-sm-6 text-end text-secondary">
                                            {{$client->status}}
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Страна/Город/Адресс')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$client->country}} | {{$client->city}} | {{$client->address}}
                                    </div>
                                </div>
                                @if($client->company != null or $client->contractSum != null)
                                    <hr>
                                    <div class="row d-flex flex-wrap">
                                        <div class="col-6 d-flex align-items-center justify-content-between">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">{{__('Название компании')}}</h6>
                                            </div>
                                            <div class="col-sm-6 text-end text-secondary">
                                                {{$client->company}}
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-between">
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">{{__('Потенциальная сумма контракта')}}</h6>
                                            </div>
                                            <div class="col-sm-6 text-end text-secondary">
                                                {{$client->contractSum}}
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
{{--                    @if($client->comment !=null)--}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body position-relative client-comment-body">
                                    <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editClientComment(this)" data-id="{{$client->id}}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <h6>{{__('Комментарий')}}</h6>
                                    <hr>
                                    <p>{{$client->comment}}</p>
                                </div>
                            </div>
                        </div>
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
@endsection
