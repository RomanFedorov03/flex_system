@extends('layouts.app')
@section('title', __('Сотрудники'))
@section('content')
    <div class="container">
        <ul class="nav nav-pills mb-3 position-relative" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link h5 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Сотрудники')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link h5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('Профессии')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link h5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('ЗП ведомость')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                    <h4 class="h4">{{__('Сотрудники')}}</h4>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{route('staff.staff_action')}}" type="button" class="btn btn-outline-success btn-lg">{{__('Создать')}}</a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr class="">
                        <th></th>
                        <th>{{__('Имя')}}</th>
                        <th>{{__('Фамилия')}}</th>
                        <th>{{__('Отчество')}}</th>
                        <th>{{__('Профессия')}}</th>
                        <th>{{__('Статус')}}</th>
                        <th>{{__('Текущая задача')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->staff as $staff)
                        <tr class="cursor-pointer" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">
                            @if($staff->photo != null)
                                <td class="py-3" width="30"><img src="{{asset('files/image/staff/'.$staff->photo)}}" width="25" alt=""></td>
                            @else
                                <td class="py-3" width="30"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                            @endif
                            <td class="py-3">{{$staff->surname}}</td>
                            <td class="py-3">{{$staff->name}}</td>
                            <td class="py-3">{{$staff->patronymic}}</td>
                            <td class="py-3">{{$staff->profession}}</td>
                            <td class="py-3">Онлайн</td>
                            <td class="py-3">Задача 2</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                    <h4 class="h4">{{__('Профессии')}}</h4>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button  type="button" class="btn btn-outline-success btn-lg" data-bs-toggle="modal" data-bs-target="#cr-profession-modal">{{__('Создать')}}</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex row gutters-sm professions">
                    @foreach($company->professions as $profession)
                        <div class="col-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#profession-modal" onclick="professionInfo({{$profession->id}})">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-start">
                                        @if($profession->photo == null)
                                            <img class="me-2" src="{{asset('files/image/staff/basic-photo.svg')}}" width="30" alt="">
                                        @else
                                            <img class="me-2" src="{{asset('files/image/professions/'.$profession->photo)}}" width="30" alt="">
                                        @endif
                                        <h5 class="h5 m-0">{{$profession->name}}</h5>
                                    </div>
                                    <hr>
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class=" text-secondary text-end">
                                            {{$profession->staff->count()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
        </div>
    </div>


    <!-- Модальное окно создания профессии -->
    <div class="modal fade" id="cr-profession-modal" tabindex="-1" aria-labelledby="CrProfessionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="CrProfessionModalLabel">Дазайнер</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="create-profession-name">
                        <label for="create-profession-name">{{__('Название профессии')}}</label>
                    </div>
                    <div class="mb-3">
                        <label for="create-profession-icon" class="form-label">Выберите иконку</label>
                        <input class="form-control" type="file" id="create-profession-icon">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Закрыть')}}</button>
                    <button class="btn btn-outline-success" onclick="createProfession()">{{__('Сохранить')}}</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Модальное окно профессии -->
    <div class="modal fade" id="profession-modal" tabindex="-1" aria-labelledby="ProfessionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-light profession-info">

            </div>
        </div>
    </div>
@endsection
