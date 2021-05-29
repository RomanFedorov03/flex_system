<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectSave(this)" data-id="{{$project->id}}">
    <i class="far fa-save"></i>
</a>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Имя')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control mb-2" id="project-name" value="{{$project->name}}">
        <select class="form-select" id="project-status" aria-label="Default select example">
            <option value="Новый" @if($project->status =='Новый') selected @endif>{{__('Новый')}}</option>
            <option value="В работе" @if($project->status =='В работе') selected @endif>{{__('В работе')}}</option>
            <option value="Завершен" @if($project->status =='Завершен') selected @endif>{{__('Завершен')}}</option>
        </select>
    </div>
</div>
{{--@foreach($project->responsibless as $responsible)--}}
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Ответственный')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select class="form-select" id="project-responsible" aria-label="Default select example">
                @foreach($company->staff as $staff)
                    <option value="{{$staff->id}}" @if($project->responsibless->first()->id == $staff->id) selected @endif>{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</option>
                @endforeach
            </select>
        </div>
    </div>
{{--@endforeach--}}

{{--@foreach($project->clients as $client)--}}
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Клиент')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select class="form-select" id="project-client" aria-label="Default select example">
                @foreach($company->clients as $client)
                    <option value="{{$client->id}}" @if($project->clients->first()->id == $client->id) selected @endif>{{$client->surname}} {{$client->name}} {{$client->patronymic}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Телефон')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            {{$project->clients->first()->phone}}
        </div>
    </div>
{{--@endforeach--}}
<hr>
<div class="row d-flex flex-wrap">
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Дата начала')}}</h6>
        </div>
        <div class="col-sm-9 text-end text-secondary">
            <input type="date" class="form-control mb-2" id="project-startDate" value="{{$project->startDate}}">
        </div>
    </div>
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Дата финала')}}</h6>
        </div>
        <div class="col-sm-9 text-end text-secondary">
            <input type="date" class="form-control mb-2" id="project-endDate" value="{{$project->endDate}}">
        </div>
    </div>
</div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Адресс')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control mb-2" id="project-address" value="{{$project->address}}">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Контактное лицо')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control mb-2" id="project-contact" value="{{$project->contact}}">
        </div>
    </div>
