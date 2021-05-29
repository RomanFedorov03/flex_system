<div class="comment">
    @foreach($comment->commentators as $commentator)
        @if($commentator->photo !== null)
            <img class="me-2" src="{{asset('files/image/staff/'.$commentator->photo)}}" width="30" alt="">
        @else
            <img class="me-2" src="{{asset('files/image/staff/basic-photo.svg')}}" width="30" alt="">
        @endif
    @endforeach
    <div class="comment-content w-100">
        <div class="comment-header">
            @foreach($comment->commentators as $commentator)
                <span class="fw-bold">{{$commentator->surname}} {{$commentator->name}} {{$commentator->patronymic}}</span> <span>{{date_format($comment->created_at,'d')}} {{date_format($comment->created_at,'M')}} {{__('в')}} {{date_format($comment->created_at,'H:i')}}</span>
            @endforeach
        </div>
        <div class="comment-body card p-2 px-3">
            {{$comment->text}}
        </div>
        <div class="comment-footer">
            <span class="btn-link cursor-pointer me-2">{{__('Изменить')}}</span>
            <span class="btn-link cursor-pointer me-2">{{__('Удалить')}}</span>
        </div>
    </div>
</div>
