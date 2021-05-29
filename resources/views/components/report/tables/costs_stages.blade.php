<table class="table  table-hover position-relative">
    <thead>
    <tr class="position-sticky top-0">
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" colspan="3">{{__('Этап')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Первая задача')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Часы план/факт')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Дни план/факт')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Последняя задача')}}</th>
{{--        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Рейт')}}</th>--}}
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('ДС план/факт')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Отклонение')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($project->stages as $stage)
        <tr class="">
            <td class="" colspan="3">{{$stage->name}}</td>
            <td class="">
                @if($stage->tasks->count() > 0)
                    {{$stage->tasks->sortByDesc('date_start')->first()->date_start}}
                @else
                    -
                @endif
            </td>
            <td class="">
                @if($stage->tasks->count() > 0)
                    {{$stage->tasks->sum('time')}}/
                @else
                    -
                @endif
            </td>
            <td class="">
                @if($stage->tasks->count() > 0)
                    {{$stage->tasks->sum('duration')}}/
                @else
                    -
                @endif
            </td>
            <td class="">
                @if($stage->tasks->count() > 0)
                    {{$stage->tasks->sortByDesc('date_start')->last()->date_start}}
                @else
                    -
                @endif
            </td>
            <td class="">
                @php($ds = 0)
                @foreach($stage->tasks as $task)
                    @foreach($task->participants as $participant)
                        @if($task->participants->count() > 0)
                            @php($rate = \App\Models\Related\Task_Participant::all()->where('task_id',$task->id)->where('staff_id',$participant->id)->first()->rate)
                        @else
                            @php($rate = 0)
                        @endif
                        @if($task->time != null) @php($task_time = $task->time) @else @php($task_time = 0) @endif
                        @php($ds = $ds + ($rate*$task_time))
                    @endforeach
                @endforeach
                {{$ds}}/
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
