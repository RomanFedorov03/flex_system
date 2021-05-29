@extends('layouts.app')
@section('title', __('Добавить сотрудника'))
@section('content')
    <div class="container">
        @if( old('error') != '')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ошибка!</strong> {{old('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3">
            <h4 class="h4">{{__('Добавить сотрудника')}}</h4>
        </div>
        <form class="row g-3 ca" method="POST" action="{{route('staff.staff_create')}}" enctype="multipart/form-data">
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
                <input type="number" class="form-control" name="rate" value="{{ old('rate') }}" id="rate">
                <label for="rate">{{__('Рейт')}}</label>
            </div>
            <div class="form-floating col-md-4">
                <select class="form-select" id="profession" name="profession" aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="profession">{{__('Профессия')}}</label>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                <h5 class="h5">{{__('Документы')}}</h5>
            </div>
            <div class="form-check user-select-none">
                <input class="form-check-input" type="checkbox" value="1" name="contract" id="contract">
                <label class="form-check-label" for="contract">
                    {{__('Договор подписан')}}
                </label>
            </div>
            <div class="col-md-4 mb-3">
                <label for="passport" class="form-label">{{__('Паспорт')}}</label>
                <input class="form-control" type="file" name="passport" id="passport">
            </div>
            <div class="col-md-4 mb-3">
                <label for="contract-file" class="form-label">{{__('Договор')}}</label>
                <input class="form-control" type="file" name="contract_file" id="contract-file">
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                <h5 class="h5">{{__('Доступы')}}</h5>
            </div>
            <div class="d-flex row gutters-sm p-0 m-0 ">
                <div class="col-md-3 mb-3">
                    <div class="card user-select-none">
                        <div class="card-header">{{__('Дашборд')}}</div>
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="dashboard-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-2" value="1">
                                <label class="form-check-label cursor-pointer" for="dashboard-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-3" value="2">
                                <label class="form-check-label cursor-pointer" for="dashboard-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_dashboard" id="dashboard-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_project" id="project-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="project-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_project" id="project-2" value="1">
                                <label class="form-check-label cursor-pointer" for="project-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_project" id="project-3" value="2">
                                <label class="form-check-label cursor-pointer" for="project-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_project" id="project-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_task" id="task-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="task-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_task" id="task-2" value="1">
                                <label class="form-check-label cursor-pointer" for="task-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_task" id="task-3" value="2">
                                <label class="form-check-label cursor-pointer" for="task-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_task" id="task-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_template" id="template1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="template-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_template" id="template-2" value="1">
                                <label class="form-check-label cursor-pointer" for="template-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_template" id="template-3" value="2">
                                <label class="form-check-label cursor-pointer" for="template-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_template" id="template-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_staff" id="staff-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="staff-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_staff" id="staff-2" value="1">
                                <label class="form-check-label cursor-pointer" for="staff-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_staff" id="staff-3" value="2">
                                <label class="form-check-label cursor-pointer" for="staff-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_staff" id="staff-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_client" id="client-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="client-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_client" id="client-2" value="1">
                                <label class="form-check-label cursor-pointer" for="client-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_client" id="client-3" value="2">
                                <label class="form-check-label cursor-pointer" for="client-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_client" id="client-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_report" id="report-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="report-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_report" id="report-2" value="1">
                                <label class="form-check-label cursor-pointer" for="report-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_report" id="report-3" value="2">
                                <label class="form-check-label cursor-pointer" for="report-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_report" id="report-4" value="3">
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
                                <input class="form-check-input" type="radio" name="access_finance" id="finance-1" value="0" checked>
                                <label class="form-check-label cursor-pointer" for="finance-1">Запрещено</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_finance" id="finance-2" value="1">
                                <label class="form-check-label cursor-pointer" for="finance-2">Просмотр</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_finance" id="finance-3" value="2">
                                <label class="form-check-label cursor-pointer" for="finance-3">Редактирование</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="access_finance" id="finance-4" value="3">
                                <label class="form-check-label cursor-pointer" for="finance-4">Удаление</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-success btn-lg" type="submit">{{__('Добавить')}}</button>
            </div>
        </form>
    </div>
@endsection
