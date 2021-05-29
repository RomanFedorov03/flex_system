<div class="column" data-id="{{$column->id}}">
    <div class="h-auto mh-100 w-100 bg-light card p-2" >
        <div class="d-flex justify-content-between align-items-center ps-2">
            <h6 class="m-0">{{$column->name}}</h6>
            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">{{__("Редактировать")}}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2">
                    <li class="btn btn-outline-light w-100 text-dark">{{__('Изменить')}}</li>
                    <li class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#delElem">{{__('Удалить')}}</li>
                </ul>
            </div>
        </div>

        <div class="w-100 h-100 d-flex gutters-sm flex-column tasks__list p-2" style="overflow-x: auto;">
            @foreach($column->tasks->sortBy('number') as $task)
                <div class="task task-{{$task->id}} tasks__item text-dark p-1" data-id="{{$task->id}}">
                    <div class="card bg-white p-2 " data-id="{{$task->id}}" data-pr="{{$project->id}}" onclick="taskView(this)" data-bs-toggle="modal" data-bs-target="#taskEdit">
                        <p class="task-name-{{$task->id}}">{{$task->name}}</p>
                    </div>
                </div>
            @endforeach
            <hr class="tasks__item task-hr-{{$column->id}}">
        </div>

        <div class="w-100">
            <input class="form-control mb-1" id="task-name-{{$column->id}}" type="text" placeholder="{{__('Ввести заголовок задачи')}}">
            <button class="btn btn-success" onclick="kanbanCreateElem(this)" data-column="{{$column->id}}" data-type="task" data-pr="{{$project->id}}">{{__('Добавить')}}</button>
        </div>
    </div>
</div>
