<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="saveClientComment(this)" data-id="{{$client->id}}">
    <i class="far fa-save"></i>
</a>
<h6>{{__('Комментарий')}}</h6>
<hr>
<textarea class="form-control" id="client-comment" rows="3">{{$client->comment}}</textarea>

