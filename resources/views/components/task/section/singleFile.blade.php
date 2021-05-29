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
