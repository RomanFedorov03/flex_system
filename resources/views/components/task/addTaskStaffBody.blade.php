<h6 class="h6 text-center w-100">{{__('Выберите учисников')}}</h6>
<hr>
<table class="table table-hover">
    <tbody class="">
    @foreach($staffs as $staff)
        @php($check = true)
        @foreach($task->participants as $participant)
            @if($staff->id == $participant->id)  @php($check = false)  @endif
        @endforeach
        @if($check == true)
            <tr class="cursor-pointer task-staff" onclick="addStaffTask(this)" data-id="{{$staff->id}}" data-task="{{$task->id}}" data-pr="{{$project_id}}">
                @if($staff->photo != null)
                    <td class="py-3" width="30"><img src="{{asset('files/image/staff/'.$staff->photo)}}" width="25" alt=""></td>
                @else
                    <td class="py-3" width="30"><img src="{{asset('files/image/staff/Frame.png')}}" width="25" alt=""></td>
                @endif
                <td class="py-3">{{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
