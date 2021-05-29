<div class="checklist">
    <div class="checklist-header">
        <h6 class="h6 fw-bold text-uppercase mt-4"><i class="far fa-check-square me-2"></i>{{$checklist->name}}</h6>
    </div>
    <div class="d-flex align-items-center justify-content-start mb-2">
        @if($checklist->checkboxes->count() > 0)
            <span class="me-2 checklist-span-{{$checklist->id}}">{{round(($checklist->checkboxes->where('status','true')->count()/$checklist->checkboxes->count())*100)}}%</span>
            <div class="progress w-100">
                <div class="progress-bar checklist-progress-{{$checklist->id}}" role="progressbar" style="width: {{round(($checklist->checkboxes->where('status','true')->count()/$checklist->checkboxes->count())*100)}}%;" aria-valuenow="{{($checklist->checkboxes->where('status','true')->count()/$checklist->checkboxes->count())*100}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        @else
            <span class="me-2 checklist-span-{{$checklist->id}}">0%</span>
            <div class="progress w-100">
                <div class="progress-bar checklist-progress-{{$checklist->id}}" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        @endif
    </div>

    <div class="checklist-body-{{$checklist->id}} mb-3 ps-4">
        @foreach($checklist->checkboxes as $checkbox)
            <div class="form-check mb-2 user-select-none">
                <input class="form-check-input" type="checkbox" @if($checkbox->status == 'true') checked @endif onchange="checkedTaskCheckbox(this)" data-id="{{$checkbox->id}}" data-list="{{$checklist->id}}" id="checklist-checkbox-{{$checkbox->id}}">
                <label class="form-check-label cursor-pointer" for="checklist-checkbox-{{$checkbox->id}}">
                    {{$checkbox->name}}
                </label>
            </div>
        @endforeach
    </div>
    <div class="checklist-footer d-flex align-items-center col-6 ps-4">
        <input type="text" class="form-control" id="checkbox-name-{{$checklist->id}}" placeholder="{{__('Добавить элемент')}}">
        <button class="btn btn-outline-success ms-2" onclick="createCheckbox(this)" data-id="{{$checklist->id }}">{{__('Создать')}}</button>
    </div>
</div>
