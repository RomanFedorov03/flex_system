<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectComment(this)" data-id="{{$project->id}}">
    <i class="far fa-edit"></i>
</a>
<h6>{{__('Комментарий')}}</h6>
<hr>
<p>{{$project->comment}}</p>
