<option value="0" class="">{{__('Выберите Шаг')}}</option>
@foreach($stage->steps as $step)
    <option value="{{$step->id}}">{{$step->name}}</option>
@endforeach
