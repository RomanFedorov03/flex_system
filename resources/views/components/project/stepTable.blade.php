<table class="table table-hover position-relative">
    <thead>
    <tr class="position-sticky top-0">
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('№')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);" colspan="3">{{__('Навание')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Сроки')}}</th>
        <th class="position-sticky bg-white top-0 border-bottom" style="box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);">{{__('Задачи')}}</th>
        <th class=""></th>
    </tr>
    </thead>
    <tbody>
    @if(isset($stage_id))
        @if($stage_id == 0)
            @php($op = '>')
        @else
            @php($op = '=')
        @endif
    @else
        @php($op = '>')
        @php($stage_id = 0)
    @endif
    @foreach($project->stages->where('id',$op,$stage_id) as $stage)
        <tr class="table-dark stage-{{$stage->id}}">
            <td class="" colspan="6">{{$stage->name}}</td>
            <td class="" width="25">
                <button class="btn btn-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="stage" data-id="{{$stage->id}}">
                    <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                </button>
            </td>
        </tr>
        @if($stage->steps->count() == 0)
            <tr class="stage-{{$stage->id}}">
                <td class="text-center" colspan="6">{{__('В данном этаме отсутствуют шаги.')}}</td>
            </tr>
        @else
            @foreach($stage->steps as $step)
                <tr class="stage-{{$stage->id}} step-{{$step->id}}">
                    <td class="py-2">{{$step->id}}</td>
                    <td class="py-2" colspan="3">{{$step->name}}</td>
                    <td class="py-2">{{__('Сроки')}}</td>
                    <td class="py-2"><a href="">{{__('Задачи')}}</a></td>
                    <td class="" width="25">
                        <button class="btn btn-outline-danger m-0 p-0 px-1"  data-bs-toggle="modal" data-bs-target="#delElem" onclick="delElem(this)" data-type="step" data-id="{{$step->id}}">
                            <svg id="Layer_1" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m15.84 22.25h-7.68a3.05 3.05 0 0 1 -3-2.86l-.91-13.84a.76.76 0 0 1 .2-.55.77.77 0 0 1 .55-.25h14a.75.75 0 0 1 .75.8l-.87 13.84a3.05 3.05 0 0 1 -3.04 2.86zm-10-16 .77 13.05a1.55 1.55 0 0 0 1.55 1.45h7.68a1.56 1.56 0 0 0 1.55-1.45l.81-13z"/><path d="m21 6.25h-18a.75.75 0 0 1 0-1.5h18a.75.75 0 0 1 0 1.5z"/><path d="m15 6.25h-6a.76.76 0 0 1 -.75-.75v-1.8a2 2 0 0 1 1.95-1.95h3.6a2 2 0 0 1 1.95 2v1.75a.76.76 0 0 1 -.75.75zm-5.25-1.5h4.5v-1a.45.45 0 0 0 -.45-.45h-3.6a.45.45 0 0 0 -.45.45z"/><path d="m15 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m9 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/><path d="m12 18.25a.76.76 0 0 1 -.75-.75v-8a.75.75 0 0 1 1.5 0v8a.76.76 0 0 1 -.75.75z"/></svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
    @endforeach
    </tbody>
</table>
