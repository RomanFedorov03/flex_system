<div class="form-check mb-2 user-select-none">
    <input class="form-check-input" type="checkbox" @if($checkbox->status == 'true') checked @endif onchange="checkedTaskCheckbox(this)" data-id="{{$checkbox->id}}" data-list="{{$checklist->id}}" id="checklist-checkbox-{{$checkbox->id}}">
    <label class="form-check-label cursor-pointer" for="checklist-checkbox-{{$checkbox->id}}">
        {{$checkbox->name}}
    </label>
</div>
