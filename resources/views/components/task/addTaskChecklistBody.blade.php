<h6 class="h6 text-center w-100">{{__('Добавление списка задач')}}</h6>
<hr>
<div class="d-flex w-100 position-relative">
    <label class="w-100">
        <input type="text" class="form-control" id="checklist-name" placeholder="{{__('Введите название')}}">
    </label>
    <button class="btn btn-outline-success ms-2" onclick="createChecklist(this)" data-id="{{$task->id }}">{{__('Создать')}}</button>
</div>
