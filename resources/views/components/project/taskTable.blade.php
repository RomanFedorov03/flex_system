<table class="table table-hover position-relative">
    <thead>
    <tr class="position-sticky top-0">
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('№')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" colspan="3">{{__('Навание')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Дедлайн')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Сотрудники')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Часы')}}</th>
        <th class=""></th>
        <th class=""></th>
    </tr>
    </thead>
    <tbody>
    @if(isset($stage_id))
        @if($stage_id == 0)
            @php($op = '>')
        @else
            @php($op = '=')
        @endif
    @else
        @php($op = '>')
        @php($stage_id = 0)
    @endif
    @foreach($project->stages->where('id',$op,$stage_id) as $stage)
        <tr class="table-dark stage-{{$stage->id}}">
            <td class="" colspan="7">{{$stage->name}}</td>
            <td class="" width="25"></td>
            <td class="" width="25">
                <button class="btn btn-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="stage" data-id="{{$stage->id}}">
                    <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                </button>
            </td>
        </tr>
        @if($stage->tasks->count() == 0)
            <tr class="stage-{{$stage->id}}">
                <td class="text-center" colspan="6">{{__('В данном этапе отсутствуют задачи.')}}</td>
            </tr>
        @else
{{--            @foreach($stage->steps as $step)--}}
{{--                @if($step->tasks->count() > 0)--}}
{{--                    <tr class="table-secondary stage-{{$stage->id}} step-{{$step->id}}">--}}
{{--                        <td class="py-2" colspan="7">{{$step->name}}</td>--}}
{{--                        <td class="" width="25"></td>--}}
{{--                        <td class="" width="25">--}}
{{--                            <button class="btn btn-outline-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="step" data-id="{{$step->id}}">--}}
{{--                                <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endif--}}
            @foreach($stage->tasks as $task)
                <tr class="stage-{{$stage->id}} task-{{$task->id}} ">
                    <td class="py-2 cursor-pointer">{{$task->id}}</td>
                    <td class="py-2 cursor-pointer" colspan="3">{{$task->name}}</td>
                    <td class="py-2 cursor-pointer">{{$task->date_end}}</td>
                    <td class="py-2 cursor-pointer">
                        <div class="position-relative">
                            @foreach($task->participants as $participant)
                                @if($participant->photo !== null)
                                    <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/staff/'.$participant->photo)}}" width="25" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
                                @else
                                    <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/icons/basic-photo.svg')}}" width="25" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
                                @endif
                            @endforeach
                        </div>
                    </td>
                    <td class="py-2 cursor-pointer">{{$task->time}}</td>
                    <td class="" width="25">
                        <button class="btn btn-outline-info m-0 p-0 px-2" data-id="{{$task->id}}" data-pr="{{$project->id}}" data-bs-toggle="modal" data-bs-target="#taskEdit" onclick="taskView(this)"><i class="fas fa-info"></i></button>
                    </td>
                    <td class="" width="25">
                        <button class="btn btn-outline-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="task" data-id="{{$task->id}}">
                            <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                        </button>
                    </td>
                </tr>
            @endforeach
{{--            @endforeach--}}
        @endif
    @endforeach
    </tbody>
</table>
<h5 class="h5 mt-4">{{__('Свободные задачи')}}</h5>
@if($project->tasks->where('stage_id',null)->count() > 0)
    <table class="table table-hover position-relative">
        <thead>
        <tr class="position-sticky top-0">
            <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('№')}}</th>
            <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" colspan="3">{{__('Навание')}}</th>
            <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Дедлайн')}}</th>
            <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Сотрудники')}}</th>
            <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Часы')}}</th>
            <th class=""></th>
            <th class=""></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($stage_id))
            @if($stage_id == 0)
                @php($op = '>')
            @else
                @php($op = '=')
            @endif
        @else
            @php($op = '>')
            @php($stage_id = 0)
        @endif
            @foreach($project->tasks->where('step_id',null) as $task)
                    <tr class="task-{{$task->id}}">
                        <td class="py-2 cursor-pointer">{{$task->id}}</td>
                        <td class="py-2 cursor-pointer" colspan="3">{{$task->name}}</td>
                        <td class="py-2 cursor-pointer">{{$task->date_end}}</td>
                        <td class="py-2 cursor-pointer">
                            <div class="position-relative">
                                @foreach($task->participants as $participant)
                                    @if($participant->photo !== null)
                                        <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/staff/'.$participant->photo)}}" width="25" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
                                    @else
                                        <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/icons/basic-photo.svg')}}" width="25" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="py-2 cursor-pointer">{{$task->time}}</td>
                        <td class="" width="25">
                            <button class="btn btn-outline-info m-0 p-0 px-2" data-id="{{$task->id}}" data-pr="{{$project->id}}" data-bs-toggle="modal" data-bs-target="#taskEdit" onclick="taskView(this)"><i class="fas fa-info"></i></button>
                        </td>
                        <td class="" width="25">
                            <button class="btn btn-outline-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="task" data-id="{{$task->id}}">
                                <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                            </button>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endif
