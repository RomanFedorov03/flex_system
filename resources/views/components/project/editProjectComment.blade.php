<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="saveProjectComment(this)" data-id="{{$project->id}}">
    <i class="far fa-save"></i>
</a>
<h6>{{__('Комментарий')}}</h6>
<hr>
<textarea class="form-control" id="project-comment" rows="3">{{$project->comment}}</textarea>

