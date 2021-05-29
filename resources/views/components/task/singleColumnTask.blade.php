<div class="task task-{{$task->id}} tasks__item text-dark p-1" data-id="{{$task->id}}">
    <div class="card bg-white p-2 " data-id="{{$task->id}}" data-pr="{{$project->id}}" onclick="taskView(this)" data-bs-toggle="modal" data-bs-target="#taskEdit">
        <p class="task-name-{{$task->id}}">{{$task->name}}</p>
    </div>
</div>
