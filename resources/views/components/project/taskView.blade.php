<div class="modal-header">
    <input class="h5 border-0 p-2 m-0 w-100" type="text" onchange="saveTaskElem(this)" data-id="{{$task->id}}" data-type="name" value="{{$task->name}}">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body p-3 px-4">
    <div class="d-flex flex-wrap row gutters-sm">
        <div class="col-sm-10">
            @if($task->participants->count() > 0)
                <div class="staff-section">
                    @include('components.task.section.staffSection')
                </div>
            @endif
            <div class="w-100" id="editor">
                <label class="h6 fw-bold text-uppercase w-100 mt-4">
                    <i class="fas fa-align-justify me-2"></i>{{__('Описание')}}
                    <textarea onfocusout="markTextarea(this)" onchange="saveTaskElem(this)" data-id="{{$task->id}}" data-type="description" rows="5" class="mark-textarea d-none form-control border-0 p-2 bg-grey w-100 mt-2" :value="input" @input="update">{{$task->task}}</textarea>
                </label>
                <div class="mark-text bg-light p-2 w-100" id="mark_text" onclick="markText(this)" v-html="compiledMarkdown"></div>
            </div>
                <script>
                    new Vue({
                        el: "#editor",
                        data: {
                            input: `{{$task->task}}`
                        },
                        computed: {
                            compiledMarkdown: function() {
                                return marked(this.input, { sanitize: true });
                            }
                        },
                        methods: {
                            update: _.debounce(function(e) {
                                this.input = e.target.value;
                            }, 300)
                        }
                    });
                </script>
            <h6 class="h6 fw-bold text-uppercase mt-4"><i class="fas fa-paperclip me-2"></i>{{__('Вложения')}}</h6>
            <div class="task-files mb-3">
                @foreach($task->files as $file)
                    <div class="d-flex mb-2">
                        <div class="file-logo-block">
                            @php($mime = explode( '.', $file->name ))
                            <span >{{end( $mime )}}</span>
                        </div>
                        <div class="file-description-block">
                            <span class="file-name">{{$file->name}}</span>
                            <span class="description">
                                <span>{{__('Добавлено ')}}{{date_format($file->created_at,'d')}} {{date_format($file->created_at,'M')}} {{__('в')}} {{date_format($file->created_at,'H:i')}}</span>
{{--                                <a href="#">{{__('Комментирий')}}</a>--}}
                                <a href="{{asset('files/file/'.$file->serv_name)}}" download="{{$file->name}}">{{__('Скачать')}}</a>
                                <a href="#">{{__('Удалить')}}</a>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <input id="task_file" onchange="addFileTask(this)" data-id="{{$task->id}}" type="file" class="d-none">
            <label for="task_file" class="btn btn-light btn-grey">{{__('Добавить вложение')}}</label>

{{--        Чек-лист        --}}


            <div class="checklists">
                @foreach($task->checklists as $checklist)
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

                @endforeach
            </div>

{{--        Действия        --}}
            <h6 class="h6 fw-bold text-uppercase mt-4"><i class="fas fa-tasks me-2"></i>{{__('Действия')}}</h6>

            <div class="d-flex align-items-center w-100">
                @if(Auth::user()->photo !== null)
                    <img class="me-2" src="{{asset('files/image/staff/'.Auth::user()->photo)}}" width="30" alt="">
                @else
                    <img class="me-2" src="{{asset('files/image/staff/basic-photo.svg')}}" width="30" alt="">
                @endif
                <label class="w-100">
                    <input type="text" class="form-control" id="comment-input" autocomplete="off" placeholder="{{__('Оставить комментарий')}}">
                </label>
                <button class="btn btn-outline-success ms-2" onclick="createComments(this)" data-id="{{$task->id}}">{{__('Отправить')}}</button>
            </div>
            <div class="task-comments mt-2 p-2">
                @foreach($task->comments->sortByDesc('created_at') as $comment)
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
                @endforeach
            </div>

        </div>
        <div class="col-sm-2 d-flex flex-column">
            <h6 class="h6 text-secondary ">{{__('Добавить на карточку')}}</h6>
            <button class="btn btn-light btn-grey mb-2 text-start" onclick="taskAddStaffMenu(this)" data-id="{{$task->id}}" data-pr="{{$project->id}}" data-type="staff"><i class="far fa-user me-2 taskadd"></i>{{__('Учасники')}}</button>
            <button class="btn btn-light btn-grey mb-2 text-start"><i class="fas fa-paperclip me-2"></i>{{__('Вложение')}}</button>
            <button class="btn btn-light btn-grey mb-2 text-start" onclick="taskAddStaffMenu(this)" data-id="{{$task->id}}" data-pr="{{$project->id}}" data-type="checklist"><i class="far fa-check-square me-2"></i>{{__('Чек-лист')}}</button>
            <button class="btn btn-light btn-grey mb-2 text-start"><i class="far fa-clock me-2"></i>{{__('Срок')}}</button>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Отмена')}}</button>
    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" id="deletePrElement"  onclick="deletePrElement(this)" data-type="task" data-pg="task" data-elemId="{{$task->id}}">{{__('Удалить')}}</button>
</div>
