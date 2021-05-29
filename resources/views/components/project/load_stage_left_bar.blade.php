<input type="radio" class="btn-check" data-value="0" name="stage" id="stage" data-id="{{$project->id}}" onclick="prStepFilter(this)" autocomplete="off" checked>
<label class="btn btn-outline-dark" for="stage">Все этапы</label>
@foreach($project->stages as $stage)
    <input type="radio" class="btn-check" data-value="{{$stage->id}}" name="stage" id="stage{{$stage->id}}" data-id="{{$project->id}}" onclick="prStepFilter(this)" autocomplete="off">
    <label class="btn btn-outline-dark" for="stage{{$stage->id}}">{{$stage->name}}</label>
@endforeach
