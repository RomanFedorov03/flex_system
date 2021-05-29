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
