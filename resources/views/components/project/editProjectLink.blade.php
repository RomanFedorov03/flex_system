<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="saveProjectLink(this)" data-id="{{$project->id}}">
    <i class="far fa-save"></i>
</a>
<div class="row">
    <div class="col-sm-12">
        <h6 class="mb-2">{{__('Figma')}}</h6>
    </div>
    <div class="col-sm-12 text-secondary">
        <input type="text" class="form-control mb-2" id="project-figma" value="{{$project->figma}}">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        <h6 class="mb-2">{{__('Проект')}}</h6>
    </div>
    <div class="col-sm-12 text-secondary">
        <input type="text" class="form-control mb-2" id="project-projectUrl" value="{{$project->projectUrl}}">
    </div>
</div>
