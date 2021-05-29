<a class="position-absolute cursor-pointer" style="top: 10px; right: 10px;" onclick="editProjectLink(this)" data-id="{{$project->id}}">
    <i class="far fa-edit"></i>
</a>
<div class="row">
    <div class="col-sm-6">
        <a class="h6 mb-0 @if($project->figma  != null) cursor-pointer @else link-secondary @endif" @if($project->figma  != null) href="{{$project->figma}}" target="_blank" @endif><i class="fas fa-external-link-square-alt me-2"></i>{{__('Figma')}}</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6">
        <a class="h6 mb-0  @if($project->projectUrl  != null) cursor-pointer @else link-secondary @endif" @if($project->projectUrl  != null) href="{{$project->projectUrl}}" target="_blank" @endif><i class="fas fa-external-link-square-alt me-2"></i>{{__('Проект')}}</a>
    </div>
</div>
