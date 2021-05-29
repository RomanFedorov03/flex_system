<div class="col-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#profession-modal">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-start">
                @if($profession->photo == null)
                    <img class="me-2" src="{{asset('files/image/staff/basic-photo.svg')}}" width="30" alt="">
                @else
                    <img class="me-2" src="{{asset('files/image/professions/'.$profession->photo)}}" width="30" alt="">
                @endif
                <h5 class="h5 m-0">{{$profession->name}}</h5>
            </div>
            <hr>
            <div class="row d-flex justify-content-between align-items-center">
                <div class=" text-secondary text-end">
                    {{$profession->staff->count()}}
                </div>
            </div>
        </div>
    </div>
</div>
