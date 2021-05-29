<div class="modal-header">
    <h5 class="modal-title" id="ProfessionModalLabel">{{$profession->name}}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="edit-profession-name" value="{{$profession->name}}">
        <label for="edit-profession-name">{{__('Название профессии')}}</label>
    </div>
    <div class="mb-3">
        <label for="edit-profession-icon" class="form-label">Выберите иконку</label>
        <input class="form-control" type="file" id="edit-profession-icon">
    </div>
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-outline-success">{{__('Сохранить')}}</button>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed bg-light shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    {{__('Список сотрудников')}}
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body p-0">
                    <table class="table table-hover m-0">
                        <thead>
                        <tr class="">
                            <th></th>
                            <th>{{__('Имя')}}</th>
                            <th>{{__('Фамилия')}}</th>
                            <th>{{__('Отчество')}}</th>
                            <th>{{__('Профессия')}}</th>
                            <th>{{__('Статус')}}</th>
                            <th>{{__('Текущая задача')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($profession->staff as $staff)
                            <tr class="cursor-pointer" onclick="window.location.href='{{route('staff.staff_info',$staff->id)}}'; return false">
                                <td class="py-3" width="30"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                                <td class="py-3">{{$staff->surname}}</td>
                                <td class="py-3">{{$staff->name}}</td>
                                <td class="py-3">{{$staff->patronymic}}</td>
                                <td class="py-3">{{$staff->profession}}</td>
                                <td class="py-3">Онлайн</td>
                                <td class="py-3">Задача 2</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Закрыть')}}</button>
</div>
