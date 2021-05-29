<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editClientSave({{$client->id}})">
    <i class="fas fa-user-check"></i>
</a>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Имя')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="client-name" value="{{$client->name}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Фамилия')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="client-surname" value="{{$client->surname}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Отчество')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="client-patronymic" value="{{$client->patronymic}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="date" class="form-control" id="client-birthdate" value="{{$client->birthdate}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Телефон')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="client-phone" value="{{$client->phone}}">
    </div>
</div>
<hr>
<div class="row d-flex flex-wrap">
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-6">
            <h6 class="mb-0">{{__('Email')}}</h6>
        </div>
        <div class="col-sm-6 text-end text-secondary">
            <input type="text" class="form-control" id="client-email" value="{{$client->email}}">
        </div>
    </div>
    <div class="col-6 d-flex align-items-center justify-content-between">
        <div class="col-sm-6">
            <h6 class="mb-0">{{__('Статус')}}</h6>
        </div>
        <div class="col-sm-6 text-end text-secondary">
            <select class="form-select" id="client-status" aria-label="Default select example">
                <option value="Новый" @if($client->status =='Новый') selected @endif>{{__('Новый')}}</option>
                <option value="Потенциальный" @if($client->status =='Потенциальный') selected @endif>{{__('Потенциальный')}}</option>
                <option value="Некачественный" @if($client->status =='Некачественный') selected @endif>{{__('Некачественный')}}</option>
                <option value="Клиент" @if($client->status =='Клиент') selected @endif>{{__('Клиент')}}</option>
                <option value="В работе" @if($client->status =='В работе') selected @endif>{{__('В работе')}}</option>
            </select>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Страна/Город/Адресс')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control mb-2" id="client-country" value="{{$client->country}}">
        <input type="text" class="form-control mb-2" id="client-city" value="{{$client->city}}">
        <input type="text" class="form-control" id="client-address" value="{{$client->address}}">
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
            <input type="text" class="form-control" id="client-company" value="{{$client->company}}">
            </div>
        </div>
        <div class="col-6 d-flex align-items-center justify-content-between">
            <div class="col-sm-6">
                <h6 class="mb-0">{{__('Потенциальная сумма контракта')}}</h6>
            </div>
            <div class="col-sm-6 text-end text-secondary">
            <input type="text" class="form-control" id="client-contractSum" value="{{$client->contractSum}}">
            </div>
        </div>
    </div>
@endif
