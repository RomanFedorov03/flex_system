@extends('layouts.app')
@section('title', __('Задачи'))
@section('content')
    <div class="container-fluid pb-2 px-0" style="position: absolute;height: 100vh;top: 0;padding-top: 63px;">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center bg-dark p-3 mb-3 border-bottom">
            <div class="d-flex">
                <select class="form-select me-2" style="width: 350px" id="project-id" aria-label="Default select example" onchange="loadTask()">
                    @foreach($user->projects as $project)
                        <option value="{{$project->id}}" selected>{{$project->name}}</option>
                    @endforeach
                </select>
                <select class="form-select me-2" style="width: 350px" id="project-id" aria-label="Default select example" onchange="loadTask()">
                    <option value="0">{{__('Выберите сотрудника')}}</option>
                    @foreach($project->staff as $staff)
                        <option value="{{$staff->id}}">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</option>
                    @endforeach
                </select>
            </div>

            <div class="btn-toolbar mb-2 mb-md-0" onload="loadTask()">
                <div class="btn-group">
                    <a href="{{route('projects.projects_action')}}" type="button" class="btn btn-outline-success ms-2">{{__('Создать')}}</a>
                </div>
            </div>
        </div>
        <div class="staff-kanban gutters-sm">

        </div>
    </div>

    <!-- Контекстное меню -->
    <div class="card task-add-staff-menu">
        <div class="card-body task-add-staff-body">
        </div>
    </div>

    <!-- Окно редактирования задачи -->
    <div class="modal fade" id="taskEdit" tabindex="" aria-labelledby="taskEditModalLabel" aria-hidden="true">
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
@endsection
