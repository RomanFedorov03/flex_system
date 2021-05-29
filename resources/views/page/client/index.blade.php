@extends('layouts.app')
@section('title', __('Клиенты'))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
            <h4 class="h4">{{__('Клиенты')}}</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group">
                    <a href="{{route('clients.clients_action')}}" type="button" class="btn btn-outline-success btn-lg">{{__('Создать')}}</a>
                </div>
            </div>
        </div>
        <div class="btn-toolbar justify-content-end mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group w-auto me-2" role="group" aria-label="First group">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Поиск по имени или номеру" style="width: 300px">
            </div>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">{{__('Все')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-success" for="btnradio2">{{__('Потенциальные')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-danger" for="btnradio3">{{__('Некачественные')}}</label>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr class="">
                <th></th>
                <th>{{__('Имя')}}</th>
                <th>{{__('Фамилия')}}</th>
                <th>{{__('Отчество')}}</th>
                <th>{{__('Телефон')}}</th>
                <th>{{__('Статус')}}</th>
                <th>{{__('Проект')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->clients as $client)
                <tr class="cursor-pointer">
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false" width="30"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false">{{$client->surname}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false">{{$client->name}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false">{{$client->patronymic}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false">{{$client->phone}}</td>
                    <td class="py-3" onclick="window.location.href='{{route('clients.clients_info',$client->id)}}'; return false">{{$client->status}}</td>
                    <td class="py-3">
                        <a href="{{route('staff.staff')}}">Проект №486</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
