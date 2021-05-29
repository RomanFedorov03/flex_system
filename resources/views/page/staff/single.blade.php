@extends('layouts.app')
@section('title', __($staff->surname.' '.$staff->name.' '.$staff->patronymic))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</h4>
        </div>
        <ul class="nav nav-pills mb-3 border-bottom pb-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Основная информация')}}</button>
            </li>
            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('Доступы')}}</button>
            </li>
            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('Интеграция')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex row gutters-sm">
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($staff->photo !== null)
                                        <img src="{{asset('files/image/staff/'.$staff->photo)}}" width="100%" alt="">
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
                                <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editStaffContent(this)" data-id="{{$staff->id}}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Имя')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$staff->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Отчество')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$staff->patronymic}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Фамилия')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$staff->surname}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$staff->birth_date}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Телефон')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$staff->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row d-flex flex-wrap">
                                    <div class="col-6 d-flex border-end">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Email')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$staff->email}}
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Статус')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$staff->status}}
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
                                            @if($staff->professions->count() > 0)
                                                {{$staff->professions->first()->name}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Рейт')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$staff->rate}}
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
                                        @if($staff->passport != null)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img width="50" src="{{asset('files/image/icons/passport-card.svg')}}" alt="passport">
                                                    <h5 class="m-0 ms-3">{{$staff->passport}}</h5>
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
                                        @if($staff->contract_file != null)
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img width="50" src="{{asset('files/image/icons/file.svg')}}" alt="passport">
                                                    <h5 class="m-0 ms-3">{{$staff->contract_file}}</h5>
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
{{--                <script>--}}
{{--                    fuck()--}}
{{--                </script>--}}
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="d-flex row gutters-sm p-0 m-0 ">
                    <div class="col-md-3 mb-3">
                        <div class="card user-select-none">
                            <div class="card-header">{{__('Дашборд')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-1" value="0" @if($staff->access_dashboard === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="dashboard-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-2" value="1" @if($staff->access_dashboard === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="dashboard-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-3" value="2" @if($staff->access_dashboard === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="dashboard-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-4" value="3" @if($staff->access_dashboard === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="dashboard-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Проекты')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_project" id="project-1" value="0" @if($staff->access_project === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="project-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_project" id="project-2" value="1" @if($staff->access_project === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="project-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_project" id="project-3" value="2" @if($staff->access_project === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="project-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_project" id="project-4" value="3" @if($staff->access_project === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="project-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Задачи')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_task" id="task-1" value="0" @if($staff->access_task === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="task-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_task" id="task-2" value="1" @if($staff->access_task === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="task-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_task" id="task-3" value="2" @if($staff->access_task === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="task-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_task" id="task-4" value="3" @if($staff->access_task === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="task-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Шаблон')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_template" id="template1" value="0" @if($staff->access_template === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="template-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_template" id="template-2" value="1" @if($staff->access_template === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="template-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_template" id="template-3" value="2" @if($staff->access_template === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="template-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_template" id="template-4" value="3" @if($staff->access_template === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="template-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Сотрудники')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_staff" id="staff-1" value="0" @if($staff->access_staff === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="staff-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_staff" id="staff-2" value="1" @if($staff->access_staff === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="staff-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_staff" id="staff-3" value="2" @if($staff->access_staff === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="staff-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_staff" id="staff-4" value="3" @if($staff->access_staff === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="staff-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Клиенты')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_client" id="client-1" value="0" @if($staff->access_client === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="client-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_client" id="client-2" value="1" @if($staff->access_client === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="client-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_client" id="client-3" value="2" @if($staff->access_client === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="client-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_client" id="client-4" value="3" @if($staff->access_client === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="client-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Отчетность')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_report" id="report-1" value="0" @if($staff->access_report === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="report-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_report" id="report-2" value="1" @if($staff->access_report === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="report-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_report" id="report-3" value="2" @if($staff->access_report === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="report-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_report" id="report-4" value="3" @if($staff->access_report === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="report-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-header">{{__('Финансы')}}</div>
                            <div class="card-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_finance" id="finance-1" value="0" @if($staff->access_finance === 0) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="finance-1">Запрещено</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_finance" id="finance-2" value="1" @if($staff->access_finance === 1) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="finance-2">Просмотр</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_finance" id="finance-3" value="2" @if($staff->access_finance === 2) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="finance-3">Редактирование</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="access_finance" id="finance-4" value="3" @if($staff->access_finance === 3) checked @endif>
                                    <label class="form-check-label cursor-pointer" for="finance-4">Удаление</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-outline-success">{{__('Сохранить')}}</button>
                </div>
                <p class="blockquote-footer px-3"><small class="disabled">{{__('Запрещено - даный рездел не отображается у сотрудника.')}}</small></p>
                <p class="blockquote-footer px-3"><small class="disabled">{{__('Просмотр - даный рездел отображается у сотрудника, но без возможности редактирования или удаления.')}}</small></p>
                <p class="blockquote-footer px-3"><small class="disabled">{{__('Редактирование - сотрудник может создавать или редактировать данные в разделе, но без возможности удаления.')}}</small></p>
                <p class="blockquote-footer px-3"><small class="disabled">{{__('Удаление - полный доступ к разделу, доступно создание, редактирование и удаление данных.')}}</small></p>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="d-flex row gutters-sm p-0 m-0 ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{__(' Web Work Tracker')}} @if($staff->webwork_id !=null) <span class="alert-success m-0 ms-2 p-2">{{__('Подключен')}}</span> @endif
                            </div>
                            <div class="card-body">
                                @if($staff->webwork_id !=null)
                                    <p>{{__('Web Work Tracker успешно подключен!')}}</p>
                                    <button class="btn btn-outline-danger">{{__('Отменить подключение')}}</button>
                                @else
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <p class="m-0 p-0">{{__('Указанный Email не был найден среди сотрудников Web Work Tracker.')}}</p>
                                        <button class="btn btn-outline-primary">{{__('Отправить подторый запрос')}}</button>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                    <button class="btn btn-outline-primary">{{__('Использовать другой Email')}}</button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
