<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Подтверждение регистрации</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
</head>
<body class="p-4">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <table class="table text-center table-borderless table-dark">
        <thead>
            <tr class="">
                <th><img height="50" src="{{asset('files/image/email/flex-logo.png')}}" alt=""></th>
            </tr>
        </thead>
        <tbody>
        <tr class="">
            <td class="">
                {{$staff->surname}} {{$staff->name}} {{$staff->patronymic}}
            </td>
        </tr>
        <tr class="">
            <td class="">
                Вы были зарегестрированы в системе Flex Reality.
            </td>
        </tr>
        <tr class="">
            <td class="">
                Достпы для авторизации:
            </td>
        </tr>
        <tr class="">
            <td class="">
                {{$staff->email}}
            </td>
        </tr>
        <tr class="">
            <td class="">
                {{$password}}
            </td>
        </tr>
        <tr class="">
            <td class="">
                <a href="http://laravue.loc/login" class="btn btn-dark bg-warning text-dark">Войти в систему</a>
            </td>
        </tr>
        </tbody>
    </table>
</body>
</html>
