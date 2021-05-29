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
        <h6 class="mb-0">{{__('Фамилия')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$staff->surname}}
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
