<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editClientContent(this)" data-id="{{$client->id}}">
    <i class="fas fa-user-edit"></i>
</a>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Имя')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$client->name}}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Фамилия')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$client->surname}}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Отчество')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$client->patronymic}}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$client->birthdate}}
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
<hr>
<div class="row d-flex flex-wrap">
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-6">
            <h6 class="mb-0">{{__('Email')}}</h6>
        </div>
        <div class="col-sm-6 text-end text-secondary">
            {{$client->email}}
        </div>
    </div>
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-6">
            <h6 class="mb-0">{{__('Статус')}}</h6>
        </div>
        <div class="col-sm-6 text-end text-secondary">
            {{$client->status}}
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Страна/Город/Адресс')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        {{$client->country}} | {{$client->city}} | {{$client->address}}
    </div>
</div>
@if($client->company != null or $client->contractSum != null)
    <hr>
    <div class="row d-flex flex-wrap">
        <div class="col-6 d-flex align-items-center justify-content-between">
            <div class="col-sm-6">
                <h6 class="mb-0">{{__('Название компании')}}</h6>
            </div>
            <div class="col-sm-6 text-end text-secondary">
                {{$client->company}}
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-between">
            <div class="col-sm-6">
                <h6 class="mb-0">{{__('Потенциальная сумма контракта')}}</h6>
            </div>
            <div class="col-sm-6 text-end text-secondary">
                {{$client->contractSum}}
            </div>
        </div>

    </div>
@endif
