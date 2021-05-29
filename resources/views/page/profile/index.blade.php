@extends('layouts.app')
@section('title', __('Профиль'))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{$user->surname}} {{$user->name}} {{$user->patronymic}}</h4>
        </div>
        <ul class="nav nav-pills mb-3 border-bottom pb-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Основная информация')}}</button>
            </li>
            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-api-tab" data-bs-toggle="pill" data-bs-target="#pills-api" type="button" role="tab" aria-controls="pills-api" aria-selected="false">{{__('API')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex row gutters-sm">
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($user->photo !== null)
                                        <img src="{{asset('files/image/staff/'.$user->photo)}}" width="100%" alt="">
                                    @else
                                        <img src="{{asset('files/image/staff/basic-photo.svg')}}" width="100%" alt="">
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
                            <div class="card-body position-relative staff-edit-body">
                                <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editStaffContent(this)" data-id="{{$user->id}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Имя')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Отчество')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->patronymic}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Фамилия')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->surname}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->birth_date}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Телефон')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex flex-wrap">
                                    <div class="col-6 d-flex border-end">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Email')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$user->email}}
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Статус')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$user->status}}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex flex-wrap">
                                    <div class="col-6 d-flex border-end">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Профессия')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            @if($user->professions->count() > 0)
                                                {{$user->professions->first()->name}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Рейт')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$user->rate}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex row gutters-sm">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        {{__('Паспорт')}}
                                    </div>
                                    <div class="card-body">
                                        @if($user->passport != null)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img width="50" src="{{asset('files/image/icons/passport-card.svg')}}" alt="passport">
                                                    <h5 class="m-0 ms-3">{{$user->passport}}</h5>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-outline-success">{{__('Скачать')}}</button>
                                                    <button class="btn btn-outline-danger ms-2" onclick="fuck()" data-type="passport">{{__('Удалить')}}</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        {{__('Договор')}}
                                    </div>
                                    <div class="card-body">
                                        @if($user->contract_file != null)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img width="50" src="{{asset('files/image/icons/file.svg')}}" alt="passport">
                                                    <h5 class="m-0 ms-3">{{$user->contract_file}}</h5>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-outline-success">{{__('Скачать')}}</button>
                                                    <button class="btn btn-outline-danger ms-2" id="delete_staff_file" data-type="passport">{{__('Удалить')}}</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-api" role="tabpanel" aria-labelledby="pills-api-tab">
                <div class="mb-3">
                    <h5 class="form-label h5 fw-bold">{{__('Проекты')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br> <strong>api_key</strong> - {{$user->api_key}}</p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_projects" value="{{$_SERVER['HTTP_HOST']}}/api/v1/projects?key={{$user->api_key}}" >
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_projects"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "projects": [
        {
            "id": 1,
            "name": "Project Name",   // {{__('Название проекта')}}
            "client": [
                {
                    "id": 1,
                    "name": "Федоров Иван Алексеевич"  // {{__('Клиент')}}
                }
            ],
            "responsible": [
                {
                    "id": 10,
                    "name": "Федоров Максим Алексеевич"  // {{__('Ответственный сотрудник')}}
                }
            ],
            "startDate": "2021-03-31",   // {{__('Дата начала')}}
            "endDate": "2021-12-17",   // {{__('Дата финала')}}
            "address": "address",   // {{__('Адресс проекта')}}
            "figma": "link",   // {{__('Ссылка на Figma')}}
            "projectUrl": "link",   // {{__('Ссылка на ппроект')}}
            "contact": "Contact Name",   // {{__('Имя контактного лица')}}
            "comment": "Comment",   // {{__('Коментарий к проекту')}}
            "status": "Новый",   // {{__("Статус 'Новый', 'В работе', 'Завершен'")}}
            "photo": null,   // {{__('Фото проекта')}}
            "created_at": "2021-03-29T05:03:03.000000Z",   // {{__('Дата создания')}}
            "updated_at": "2021-04-29T07:42:07.000000Z"   // {{__('Последняя дата изменения')}}
        },
          ...
    ]
                </code>
                </pre>
                <hr>
                <div class="mb-3">
                    <h5  class="form-label h5 fw-bold">{{__('Этапы')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br>
                        <strong>api_key</strong> - {{$user->api_key}}<br>
                        <strong>project</strong> - {{__('ID проекта')}}
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_stages" value="{{$_SERVER['HTTP_HOST']}}/api/v1/stages?key={{$user->api_key}}&project=1" >
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_stages"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "stages": [
        {
            "id": 3,
            "name": "Stage Name"
        },
          ...
    ]
                </code>
                </pre>
                <hr>
                <div class="mb-3">
                    <h5 class="form-label h5 fw-bold">{{__(' Все задачи')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br>
                        <strong>api_key</strong> - {{$user->api_key}}
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_tasks_all" value="{{$_SERVER['HTTP_HOST']}}/api/v1/tasks_all?key={{$user->api_key}}" >
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_tasks_all"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "tasks": [
        {
            "id": 16,
            "project_id": 1,   // {{__('ID проекта')}}
            "stage_id": 22,   // {{__('ID этапа')}}
            "name": "Создать проект",   // {{__('Название задачи')}}
            "date_start": "2021-03-18",   // {{__('Дата начала (план)')}}
            "date_end": "2021-03-19",   // {{__('Дата финала (план)')}}
            "status": "Новая",   // {{__("Статус: 'Новая', 'В работе', 'Готово к проверке', 'Завершено'")}}
            "time": "8",   // {{__('Колличество часов')}}
            "task": null,   // {{__('Описание задачи')}}
            "duration": 1,   // {{__('Колличество дней')}}
            "progress": 0,   // {{__('Прогресс задачи от 0 до 1')}}
            "created_at": "2021-05-08T10:53:01.000000Z",   // {{__('Дата создания')}}
            "updated_at": "2021-05-14T09:30:11.000000Z"   // {{__('Последняя дата изменения')}}
        },
          ...
    ]
                </code>
                </pre><hr>
                <div class="mb-3">
                    <h5 class="form-label h5 fw-bold">{{__('Задачи проекта')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br>
                        <strong>api_key</strong> - {{$user->api_key}}<br>
                        <strong>project</strong> - {{__('ID проекта')}}
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_tasks" value="{{$_SERVER['HTTP_HOST']}}/api/v1/tasks?key={{$user->api_key}}&project=1" >
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_tasks"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "tasks": [
        {
            "id": 16,
            "name": "Создать проект",   // {{__('Название задачи')}}
            "date_start": "2021-03-18",   // {{__('Дата начала (план)')}}
            "date_end": "2021-03-19",   // {{__('Дата финала (план)')}}
            "status": "Новая",   // {{__("Статус: 'Новая', 'В работе', 'Готово к проверке', 'Завершено'")}}
            "time": "8",   // {{__('Колличество часов')}}
            "task": null,   // {{__('Описание задачи')}}
            "duration": 1,   // {{__('Колличество дней')}}
            "progress": 0,   // {{__('Прогресс задачи от 0 до 1')}}
            "created_at": "2021-05-08T10:53:01.000000Z",   // {{__('Дата создания')}}
            "updated_at": "2021-05-14T09:30:11.000000Z"   // {{__('Последняя дата изменения')}}
        },
          ...
    ]
                </code>
                </pre>
                <hr>
                <div class="mb-3">
                    <h5 class="form-label h5 fw-bold">{{__('Задачи этапа')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br>
                        <strong>api_key</strong> - {{$user->api_key}}<br>
                        <strong>project</strong> - {{__('ID проекта')}}<br>
                        <strong>stage</strong> - {{__('ID этапа')}}
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_stage_tasks" value="{{$_SERVER['HTTP_HOST']}}/api/v1/stage/tasks?key={{$user->api_key}}&project=1&stage=1" >
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_stage_tasks"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "tasks": [
        {
            "id": 16,
            "name": "Создать проект",   // {{__('Название задачи')}}
            "date_start": "2021-03-18",   // {{__('Дата начала (план)')}}
            "date_end": "2021-03-19",   // {{__('Дата финала (план)')}}
            "status": "Новая",   // {{__("Статус: 'Новая', 'В работе', 'Готово к проверке', 'Завершено'")}}
            "time": "8",   // {{__('Колличество часов')}}
            "task": null,   // {{__('Описание задачи')}}
            "duration": 1,   // {{__('Колличество дней')}}
            "progress": 0,   // {{__('Прогресс задачи от 0 до 1')}}
            "created_at": "2021-05-08T10:53:01.000000Z",   // {{__('Дата создания')}}
            "updated_at": "2021-05-14T09:30:11.000000Z"   // {{__('Последняя дата изменения')}}
        },
          ...
    ]
                </code>
                </pre>
                <hr>
                <div class="mb-3">
                    <h5 class="form-label h5 fw-bold">{{__('Сотрудники')}}</h5>
                    <p><i>{{__('Ожидает:')}}</i><br>
                        <strong>api_key</strong> - {{$user->api_key}}<br>
                    </p>
                    <div class="input-group">
                        <span class="input-group-text bg-white user-select-none" id="basic-addon1">GET</span>
                        <input type="text" readonly class="form-control" id="api_staff" value="{{$_SERVER['HTTP_HOST']}}/api/v1/stage/staff?key={{$user->api_key}}">
                        <button class="input-group-text btn btn-outline-dark" onclick="copy_text(this)" data-elem="api_staff"><i class="far fa-copy"></i></button>
                    </div>
                </div>
                <h6 class="h6">{{__('Ответ:')}}</h6>
                <pre class="disabled" style="background: #e9ecef; border-radius: 10px">
                  <code>
    "status": true,
    "staff": [
        {
            "id": 9,
            "name": "Иван",   // {{__('Имя сотрудника')}}
            "email": "roma.fedorov803@gmail.com",   // {{__('Email сотрудника')}}
            "surname": "Федоров",   // {{__('Фамилия сотрудника')}}
            "patronymic": "Алексеевич",   // {{__('Отчество сотрудника')}}
            "phone": null,   // {{__('Телефон сотрудника')}}
            "birth_date": null,   // {{__('День Рождения сотрудника')}}
            "grade": null,   // {{__('Грейд сотрудника')}}
            "rate": 1,   // {{__('Рейт сотрудника')}}
            "contract": null,   // {{__('Подписан ли контракт с сотрудником')}}
            "contract_file": "money.svg",   // {{__('Файл контракта')}}
            "passport": "stats.svg",   // {{__('Файл паспорта')}}
            "status": "Активный",   // {{__('Статус сотрудника')}}
            "created_at": "2021-03-21T12:50:25.000000Z",   // {{__('Дата создания')}}
            "updated_at": "2021-04-29T04:28:14.000000Z"   // {{__('Дата обновения')}}
        },
          ...
    ]
                </code>
                </pre>

            </div>
        </div>
    </div>
@endsection
