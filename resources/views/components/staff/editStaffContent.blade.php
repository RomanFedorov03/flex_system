<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editStaffSave({{$staff->id}})">
    <i class="fas fa-user-check"></i>
</a>
{{$staff->profession}}
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Имя')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="staff-name" value="{{$staff->name}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Фамилия')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="staff-surname" value="{{$staff->surname}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Отчество')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" id="staff-patronymic" value="{{$staff->patronymic}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Дата рождения')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="date" class="form-control" id="staff-birth_date" value="{{$staff->birth_date}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
        <h6 class="mb-0">{{__('Телефон')}}</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        <input type="tel" class="form-control" id="staff-phone" value="{{$staff->phone}}">
    </div>
</div>
<hr>
<div class="row d-flex flex-wrap">
    <div class="col-6 d-flex border-end">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Email')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="email" class="form-control" id="staff-email" value="{{$staff->email}}">
        </div>
    </div>
    <div class="col-6 d-flex">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Статус')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select class="form-select" id="staff-status" aria-label="Default select example">
                <option value="Активный" @if($staff->status =='Активный') selected @endif>{{__('Активный')}}</option>
                <option value="В отпуске" @if($staff->status =='В отпуске') selected @endif>{{__('В отпуске')}}</option>
                <option value="Уволен" @if($staff->status =='Уволен') selected @endif>{{__('Уволен')}}</option>
            </select>
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
            <select class="form-select" id="staff-profession" aria-label="Default select example">
                <option selected>{{__('Выберите профессию')}}</option>
                @foreach($company->professions as $profession)
                    <option value="{{$profession->id}}" @if($staff->professions->count() > 0) @if($profession->id == $staff->professions->first()->id) selected @endif @endif>{{$profession->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 d-flex">
        <div class="col-sm-3">
            <h6 class="mb-0">{{__('Рейт')}}</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="number" class="form-control" id="staff-rate" value="{{$staff->rate}}">
        </div>
    </div>
</div>
