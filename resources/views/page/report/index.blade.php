@extends('layouts.app')
@section('title', __('Проекты'))
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
            <h4 class="h4">{{__('Отчеты')}}</h4>
        </div>
        <div class="btn-toolbar justify-content-end mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1" id="clickbtn">{{__('Расходы (этапы)')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-success" for="btnradio2">{{__('Расходы (проекты)')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">{{__('Динамика задач')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btnradio4">{{__('Часы (сотрудники)')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btnradio5">{{__('Часы (проеты)')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btnradio6">{{__('Грейд ЗП')}}</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio7" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btnradio7">{{__('Нагрузка сотрудников')}}</label>
            </div>
        </div>
        <div class="form-floating" onload="report_costsStages()">
            <select class="form-select" id="report_costsStagePr" onchange="report_costsStages()" aria-label="Floating label select example">
                @foreach($company->projects as $project)
                    <option value="{{$project->id}}" >{{$project->name}}</option>
                @endforeach
            </select>
            <label for="report_costsStagePr">{{__('Выберите проект')}}</label>
        </div>
        <div class="w-100 report-content">
{{--            @include('components.report.tables.costs_stages')--}}
        </div>
    </div>
@endsection
