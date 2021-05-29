<h6 class="h6 fw-bold text-uppercase"><i class="far fa-user me-2"></i>{{__('Учасники')}}</h6>
<div class="d-flex">
    @foreach($task->participants as $participant)
        @if($participant->photo !== null)
            <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/staff/'.$participant->photo)}}" width="35" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
        @else
            <a href="{{route('staff.staff_info',$participant->id)}}"><img src="{{asset('files/image/icons/basic-photo.svg')}}" width="35" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}"></a>
        @endif
    @endforeach
    <div class="d-flex justify-content-center align-items-center cursor-pointer" onclick="taskAddStaffMenu(this)">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0" fill="#9baab5" data-original="#2196f3" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m368 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0" fill="#fafafa" data-original="#fafafa" style="" class=""/></g></svg>
    </div>
</div>
