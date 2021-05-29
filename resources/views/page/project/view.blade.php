@extends('layouts.app')
@section('title', __($project->name.' ('.$project->status.')'))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
            <h4 class="h4">{{$project->name}} ({{$project->status}})</h4>
            <button onclick="table_data()">send</button>
        </div>
        <ul class="nav nav-pills mb-3 border-bottom pb-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Основная информация')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-gantt-tab" data-bs-toggle="pill" data-bs-target="#pills-gantt" type="button" role="tab" aria-controls="pills-gantt" aria-selected="true">{{__('График')}}</button>
            </li>
            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-staff-tab" data-bs-toggle="pill" data-bs-target="#pills-staff" type="button" role="tab" aria-controls="pills-staff" aria-selected="true">{{__('Сотрудники')}}</button>
            </li>
            <li class="nav-item ms-2" role="presentation">
                <button class="nav-link" id="pills-task-tab" data-bs-toggle="pill" data-bs-target="#pills-task" type="button" role="tab" aria-controls="pills-task" aria-selected="true">{{__('Задачи')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="d-flex row gutters-sm">
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($project->photo !== null)
                                        <img src="{{asset('files/image/project/'.$project->photo)}}" width="100%" alt="">
                                    @else
                                        <img src="{{asset('files/image/icons/basic-photo.svg')}}" width="100%" alt="">
                                    @endif
                                    <input type="file" name="photo" id="photo" class="d-none">
                                    <label class="btn btn-outline-secondary" for="photo">{{__('Изменить')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body position-relative project-link-body">
                                <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectLink(this)" data-id="{{$project->id}}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a class="h6 mb-0 @if($project->figma  != null) cursor-pointer @else link-secondary @endif" @if($project->figma  != null) href="{{$project->figma}}" target="_blank" @endif><i class="fas fa-external-link-square-alt me-2"></i>{{__('Figma')}}</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a class="h6 mb-0  @if($project->projectUrl  != null) cursor-pointer @else link-secondary @endif" @if($project->projectUrl  != null) href="{{$project->projectUrl}}" target="_blank" @endif><i class="fas fa-external-link-square-alt me-2"></i>{{__('Проект')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card mb-3">
                            <div class="card-body position-relative project-edit-body">
                                <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectContent(this)" data-id="{{$project->id}}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Имя')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$project->name}} ({{$project->status}})
                                    </div>
                                </div>
                                @foreach($project->responsibless as $responsible)
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Ответственный')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$responsible->surname}} {{$responsible->name}} {{$responsible->patronymic}}
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($project->clients as $client)
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Клиент')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$client->surname}} {{$client->name}} {{$client->patronymic}}
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
                                @endforeach
                                <hr>
                                <div class="row d-flex flex-wrap">
                                    <div class="col-6 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Дата начала')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-end text-secondary">
                                            {{$project->startDate}}
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-between">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Дата финала')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-end text-secondary">
                                            {{$project->endDate}}
                                        </div>
                                    </div>
                                </div>
                                @if($project->address !== null)
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Адресс')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$project->address}}
                                        </div>
                                    </div>
                                @endif
                                @if($project->contact !== null)
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('Контактное лицо')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{$project->contact}}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($project->comment !=null)
                            <div class="card">
                                <div class="card-body project-comment-body">
                                    <a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectComment(this)" data-id="{{$project->id}}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <h6>{{__('Комментарий')}}</h6>
                                    <hr>
                                    <p>{{$project->comment}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-gantt" role="tabpanel" aria-labelledby="pills-gantt-tab">
                <div id="gantt_here" style='width:100%; height:700px;'></div>
                <script type="text/javascript">
                    gantt.config.date_format = "%Y-%m-%d";
                    // a single day-scale
                    gantt.config.scales = [
                        {unit: "year",  format: "%Y"},
                        {unit: "day",  format: "%j, %M"}
                    ];
                    gantt.config.columns = [
                        {name: "name", tree: true, width: 200, label: "Задача", resize: true},
                        {name: "start_date", align: "center", width: 80, label: "Дата начала", resize: true,template: function (task) {
                            if (task.start_date == null){
                                return '{{date('Y-m-d')}}'
                            }else {
                                return task.start_date
                            }
                            }
                        },
                        {name: "add", width: 44}
                    ];
                    gantt.templates.task_text = function (start, end, task) {
                        return task.name;
                    };
                    var stage = [

                        { key: 0, label: "Свободная задача" },
                        @foreach($project->stages as $stage)
                        { key: {{$stage->id}}, label: "{{$stage->name}}" },
                        @endforeach
                    ];
                    var project = [
                        { key: {{$project->id}}, label: "{{$project->name}}" }
                    ];


                    gantt.locale.labels.section_name = "{{__("Задача")}}";
                    gantt.locale.labels.section_stages = "{{__("Этап")}}";
                    gantt.locale.labels.section_time = "{{__("Сроки")}}";
                    gantt.config.lightbox.sections=[
                        {name:"project",    height:22, type:"select", label: "{{__("Проект")}}", readonly:true,   map_to:"project",
                            options:project},
                        {name:"name", height:70, map_to:"name", label: "{{__("Описание")}}", type:"textarea", focus:true},
                        {name:"stages",    height:22, type:"select", label: "{{__("Этап")}}",   map_to:"stages",
                            options:stage},
                        {name: "time", type: "duration", map_to: "auto"}
                        // {name:"time",        height:72, map_to:{start_date: new Date(),end_date:new Date()}, type:"duration", time_format:["%d","%m","%Y","%H:%i"]},
                    ];
                    gantt.init("gantt_here");

                    gantt.load("/tasks/data/{{$project->id}}");
                    var dp = new gantt.dataProcessor("/tasks");
                    dp.init(gantt);
                    // dp.setTransactionMode("REST");
                    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    dp.setTransactionMode({
                        mode:"REST",
                        headers:{
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            "Content-Type": "application/x-www-form-urlencoded",
                            "Accept-Language": "fr-FR"
                        }
                    });
                </script>
            </div>
            <div class="tab-pane fade" id="pills-staff" role="tabpanel" aria-labelledby="pills-staff-tab">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                    <h6 class="h6">{{__('Сотрудники')}}</h6>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a type="button" class="btn btn-outline-success btn" data-bs-toggle="modal" data-bs-target="#addStaff">{{__('Добавить')}}</a>
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
                        <th class=""></th>
                    </tr>
                    </thead>
                    <tbody id="staff">
                    @foreach($project->staff as $staff)
                        <tr class="cursor-pointer staff-{{$staff->id}}">
                            <td class="py-3" width="30" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">{{$staff->surname}}</td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">{{$staff->name}}</td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">{{$staff->patronymic}}</td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">{{$staff->profession}}</td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">Онлайн</td>
                            <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">Задача 2</td>
                            <td class="" width="25">
                                <button class="btn btn-outline-danger m-0 p-1 px-2" data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="staff" data-id="{{$staff->id}}">
                                    <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-task" role="tabpanel" aria-labelledby="pills-task-tab">
                <div class="d-flex flex-wrap row gutters-sm">
                    <div class="col-sm-3">
                        <div class="btn-group w-100 p-2 mb-2">
                            <a type="button" class="btn btn-outline-success btn" data-bs-toggle="modal" data-bs-target="#addStage">{{__('Добавить этап')}}</a>
                            <a type="button" class="btn btn-outline-success btn" data-bs-toggle="modal" data-bs-target="#addCSV">{{__('Загрузить CSV')}}</a>
                        </div>
                        <div class="btn-group btn-group-vertical w-100 left-stage-menu" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" data-value="0" name="stage" id="stage" data-id="{{$project->id}}" onclick="prStepFilter(this)" autocomplete="off" checked>
                            <label class="btn btn-outline-dark" for="stage">Все этапы</label>
                            @foreach($project->stages as $stage)
                                <input type="radio" class="btn-check" data-value="{{$stage->id}}" name="stage" id="stage{{$stage->id}}" data-id="{{$project->id}}" onclick="prStepFilter(this)" autocomplete="off">
                                <label class="btn btn-outline-dark" for="stage{{$stage->id}}">{{$stage->name}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">

                                    <div class="btn-group p-2 mb-2">
                                        <a type="button" class="btn btn-outline-success btn add-st-tsk" data-bs-toggle="modal" data-bs-target="#addTask">{{__('Добавить')}}</a>
                                        <a type="button" class="btn btn-outline-success btn" data-bs-toggle="modal" data-bs-target="#addCSVTask">{{__('Загрузить CSV')}}</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="btn-group w-auto me-2" role="group" aria-label="First group">
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Поиск по названию" style="width: 300px">
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" value="#addTask" name="taskview" id="taskView2" autocomplete="off" checked>
                                            <label class="btn btn-outline-secondary" for="taskView2"  onclick="stepTableContent({{$project->id}})">Задачи</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-2 step-table" style="max-height: 600px;overflow: auto;">
                                @include('components.project.taskTable')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Окно добавления сотрудника в проект -->
    <div class="modal fade" id="addStaff" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">{{__('Добавить сотрудника')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <select class="form-select" id="projectStaff" name="projectStaff" aria-label="{{__('Выберите сотрудника')}}" required>
                            @foreach($user->staff as $staff)
                                <option value="{{$staff->id}}">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</option>
                            @endforeach
                        </select>
                        <label for="projectStaff">{{__('Сотрудник')}}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addStaffProject(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно добавления этапа в проект -->
    <div class="modal fade" id="addStage" tabindex="-1" aria-labelledby="addStageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStageModalLabel">{{__('Добавить Этап')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="stageName">
                        <label for="stageName">{{__('Введите название Этапа')}}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addStageProject(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно добавления CSV этапа в проект -->
    <div class="modal fade" id="addCSV" tabindex="-1" aria-labelledby="addCsvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCsvModalLabel">{{__('Загрузить CSV')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stageCsv" class="form-label">{{__('Выберите CSV файл')}}</label>
                        <input class="form-control" type="file" id="stageCsv">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addCsvProject(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно добавления CSV задачи в проект -->
    <div class="modal fade" id="addCSVTask" tabindex="-1" aria-labelledby="addCSVtaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCSVtaskModalLabel">{{__('Загрузить CSV')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="stageCsvId" name="stageCsvId" aria-label="{{__('Выберите Этап')}}" required>
                            <option value="0" class="">{{__('Прикрепить к проекту')}}</option>
                            @foreach($project->stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->name}}</option>
                            @endforeach
                        </select>
                        <label for="stageCsvId">{{__('К какому этапу относятся задачи?')}}</label>
                    </div>
                    <div class="mb-3">
                        <label for="taskCsv" class="form-label">{{__('Выберите CSV файл')}}</label>
                        <input class="form-control" type="file" id="taskCsv">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addCsvTask(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно добавления шага в проект -->
    <div class="modal fade" id="addStep" tabindex="-1" aria-labelledby="addStepModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStepModalLabel">{{__('Добавить Шаг')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="stageId" name="stageId" aria-label="{{__('Выберите сотрудника')}}" required>
                            <option value="0" class="">{{__('Выберите Этап')}}</option>
                            @foreach($project->stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->name}}</option>
                            @endforeach
                        </select>
                        <label for="stageId">{{__('К какому этапу относиться Шаг?')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="stepName">
                        <label for="stepName">{{__('Введите название Шага')}}</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="stepComment" style="height: 100px"></textarea>
                        <label for="stepComment">{{__('Комментарий')}}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addStepProject(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно добавления задачи в проект -->
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">{{__('Добавить Шаг')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap row gutters-sm">
                    <div class="form-floating col-sm-9 mb-3">
                        <input type="text" class="form-control" id="taskName" name="taskName">
                        <label for="taskName">{{__('Введите название Задачи')}}</label>
                    </div>
                    <div class="form-floating col-sm-3 mb-3">
                        <select class="form-select" id="taskPriority" name="taskPriority" aria-label="{{__('Приотритет')}}" required>
                            <option value="Срочно" class="">{{__('Срочно')}}</option>
                            <option value="Во вторую очередь" class="">{{__('Во вторую очередь')}}</option>
                            <option value="В третью очередь" class="">{{__('В третью очередь')}}</option>
                        </select>
                        <label for="taskPriority">{{__('Приотритет')}}</label>
                    </div>
                    <div class="form-floating col-sm-4 mb-3">
                        <select class="form-select" id="taskStageId" name="" onchange="loadTaskStep(this)" aria-label="{{__('Выберите Этап')}}" required>
                            <option value="0" class="">{{__('Выберите Этап')}}</option>
                            @foreach($project->stages as $stage)
                                <option value="{{$stage->id}}">{{$stage->name}}</option>
                            @endforeach
                        </select>
                        <label for="taskStageId">{{__('К какому этапу относиться Задача?')}}</label>
                    </div>
                    <div class="form-floating col-sm-4 mb-3">
                        <input type="date" class="form-control" id="tasDateStart" name="tasDateStart">
                        <label for="tasDateStart">{{__('Старт')}}</label>
                    </div>
                    <div class="form-floating col-sm-4 mb-3">
                        <input type="date" class="form-control" id="tasDateEnd" name="tasDateEnd">
                        <label for="tasDateEnd">{{__('Финал')}}</label>
                    </div>
                    <div class="form-floating col-sm-4 mb-3">
                        <input type="number" class="form-control" min="0" id="taskTime" name="taskTime">
                        <label for="taskTime">{{__('Часов на выполнение')}}</label>
                    </div>
                    <div class="form-floating col-sm-4 mb-3">
                        <select class="form-select js-example-basic-multiple" id="taskParticipants" name="taskParticipants[]" multiple="multiple" aria-label="{{__('Выберите Ответственного')}}">
                            @foreach($project->staff as $staff)
                                <option value="{{$staff->id}}">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</option>
                            @endforeach
                        </select>
                        <label for="taskParticipants">{{__('Добавьте сотрудников')}}</label>
                    </div>
                    <div class="form-floating col-sm-12 mb-3">
                        <textarea class="form-control" id="taskText" name="taskText" style="height: 100px"></textarea>
                        <label for="taskText">{{__('Задача')}}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-success" onclick="addTaskProject(this)" data-id="{{$project->id}}">{{__('Добавить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Окно редактирования задачи -->
    <div class="modal fade" id="taskEdit" tabindex="-1" aria-labelledby="taskEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content task-body">

            </div>
        </div>
    </div>
    <!-- Окно подтверждения удаления -->
    <div class="modal fade" id="delElem" tabindex="-1" aria-labelledby="delElemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delElemModalLabel">{{__('Подтвердить удаление?')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
                    <button type="button" class="btn btn-outline-danger" id="deletePrElement" onclick="deletePrElement(this)" data-id="{{$project->id}}" data-type="" data-elemId="">{{__('Удалить')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card task-add-staff-menu">
        <div class="card-body task-add-staff-body">
        </div>
    </div>
@endsection
