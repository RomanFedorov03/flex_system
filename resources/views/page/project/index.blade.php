@extends('layouts.app')
@section('title', __('Проекты'))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
            <h4 class="h4">{{__('Проекты')}}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group">
                    <a href="{{route('projects.projects_action')}}" type="button" class="btn btn-outline-success btn-lg">{{__('Создать')}}</a>
                </div>
            </div>
        </div>
        <div class="btn-toolbar justify-content-end mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group w-auto me-2" role="group" aria-label="First group">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Поиск по названию" style="width: 300px">
            </div>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1" id="clickbtn">{{__('Все')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-success" for="btnradio2">{{__('Новые')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">{{__('В работе')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btnradio4">{{__('Завершенные')}}</label>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr class="">
                <th></th>
                <th>{{__('Название')}}</th>
                <th>{{__('Статус')}}</th>
                <th>{{__('Ответственный')}}</th>
                <th>{{__('Клиент')}}</th>
                <th>{{__('Дедлайн')}}</th>
                <th>{{__('Текущий этап')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->projects as $project)
                <tr class="cursor-pointer">
                    <td class="py-3" onclick="window.location.href='{{route('projects.projects_view',$project->id)}}'; return false" width="30"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                    <td class="py-3" onclick="window.location.href='{{route('projects.projects_view',$project->id)}}'; return false">{{$project->name}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('projects.projects_view',$project->id)}}'; return false">{{$project->status}}</td>
                    @foreach($project->responsibless as $responsible)
                    <td class="py-3" onclick="window.location.href='{{route('staff.staff_info',$responsible->id)}}'; return false"><a href="#">{{$responsible->surname}} {{$responsible->name}} {{$responsible->patronymic}}</a></td>
                    @endforeach
                    @foreach($project->clients as $client)
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false"><a href="#">{{$client->surname}} {{$client->name}} {{$client->patronymic}}</a></td>
                    @endforeach
                    <td class="py-3" onclick="window.location.href='{{route('projects.projects_view',$project->id)}}'; return false">{{$project->endDate}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('projects.projects_view',$project->id)}}'; return false">Обсуждение с клиентом</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
