<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/marked@0.3.6"></script>
    <script src="https://unpkg.com/lodash@4.16.0"></script>
{{--    <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>--}}
{{--    <script src="https://code.highcharts.com/gantt/modules/exporting.js"></script>--}}

    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab4de56d1d.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<div class="save-message" id="save-message">
    {{__('Сохранено!')}}
</div>
<div class="delete-message" id="delete-message">
    {{__('Удалено!')}}
</div>
<div class="error-message" id="error-message">

</div>
<div class="process-message" id="process-message">
    <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
    {{__('Обработка')}}!
</div>
<div class="" id="app"></div>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm p-0 sticky-top">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg width="42" height="40" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0123 14.1133L16.8194 16.5829L14.0381 15.7825V14.5512L15.0123 14.1133Z" fill="url(#paint0_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0381 8.16045L16.8719 6.75439V10.0576L14.0381 11.2246V8.16045Z" fill="url(#paint1_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9996 0.919328L18.8453 3.67921L10.447 6.36377L0.616455 2.85667L5.8262 0.919328C7.34735 0.475417 9.38765 0.368959 10.9996 0.919328Z" fill="url(#paint2_linear)"/>
                            <path d="M16.8232 16.5888L20.6581 14.8644L18.4208 11.8333C19.6991 10.4554 20.4296 8.70686 20.4296 6.81973C20.4296 3.7917 18.5423 2.73415 15.5755 4.06789L10.447 6.37281V19.4541L14.0381 17.8402V14.551L15.0124 14.1131L16.8232 16.5888ZM16.8079 8.44774C16.8079 9.40085 16.3366 10.1923 15.347 10.6362L14.0381 11.2247V8.16051L15.347 7.57197C16.3366 7.12706 16.8079 7.49464 16.8079 8.44774Z" fill="#F8B657"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.616455 2.85693L10.447 6.36403V19.4544L0.616455 15.9473V2.85693Z" fill="#FFA81F"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70987 10.1339V7.40116L1.39282 4.4585V15.2058L4.8424 16.427V12.9872L9.1104 14.4977V11.7639L4.8424 10.2544V8.41252L9.70987 10.1339Z" fill="url(#paint3_linear)" stroke="#FFA81F" stroke-width="0.00891154"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.84229 12.9873L9.11028 14.4978V11.7641L9.01658 11.7319L4.84229 12.9873Z" fill="url(#paint4_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.39282 15.2059L4.8424 16.4272V14.1685L1.39282 15.2059Z" fill="url(#paint5_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.84229 8.41266L9.70975 10.1341V7.4013L9.01658 7.15625L4.84229 8.41266Z" fill="url(#paint6_linear)"/>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear" x1="16.3996" y1="13.3761" x2="15.4405" y2="16.4041" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#372813"/>
                                <stop offset="0.67059" stop-color="#8E662E"/>
                                <stop offset="1" stop-color="#E6A54A"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear" x1="16.565" y1="4.91116" x2="15.0617" y2="9.7237" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#401F06"/>
                                <stop offset="0.67059" stop-color="#936228"/>
                                <stop offset="1" stop-color="#E6A54A"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear" x1="17.9676" y1="-10.9779" x2="13.012" y2="3.15786" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#6E4E1E"/>
                                <stop offset="0.54118" stop-color="#B48A4E"/>
                                <stop offset="1" stop-color="#FAC77F"/>
                            </linearGradient>
                            <linearGradient id="paint3_linear" x1="4.799" y1="11.4225" x2="-5.39245" y2="11.1703" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3B2400"/>
                                <stop offset="0.67059" stop-color="#744D15"/>
                                <stop offset="1" stop-color="#AD772B"/>
                            </linearGradient>
                            <linearGradient id="paint4_linear" x1="8.21748" y1="10.7879" x2="7.05412" y2="13.6478" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2E1F06"/>
                                <stop offset="0.67059" stop-color="#8A6228"/>
                                <stop offset="1" stop-color="#E6A54A"/>
                            </linearGradient>
                            <linearGradient id="paint5_linear" x1="4.12849" y1="13.4012" x2="3.17187" y2="15.7294" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2E1F06"/>
                                <stop offset="0.67059" stop-color="#8A6228"/>
                                <stop offset="1" stop-color="#E6A54A"/>
                            </linearGradient>
                            <linearGradient id="paint6_linear" x1="8.6329" y1="6.11748" x2="7.43198" y2="9.24568" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#4C3511"/>
                                <stop offset="0.67059" stop-color="#996D2D"/>
                                <stop offset="1" stop-color="#E6A54A"/>
                            </linearGradient>
                            <clipPath id="clip0">
                                <rect width="20.0416" height="20" fill="white" transform="translate(0.616455)"/>
                            </clipPath>
                        </defs>
                    </svg>

                    <svg class="ms-2" width="142" height="26" viewBox="0 0 71 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.0926399 0.197266H6.94909V1.59863H1.63073V4.33301H5.82799V5.72754H1.63073V10H0.0926399V0.197266ZM9.9569 0.197266V10H8.56237V0.197266H9.9569ZM18.2831 7.12891H13.0331C13.106 7.60286 13.3384 8.01302 13.7303 8.35938C14.1268 8.70573 14.5962 8.87891 15.1385 8.87891C15.5305 8.87891 15.895 8.79004 16.2323 8.6123C16.5741 8.43457 16.8156 8.26139 16.9569 8.09277L17.1688 7.83301L18.078 8.74219C18.0506 8.77865 18.0074 8.83105 17.9481 8.89941C17.8934 8.96322 17.7727 9.07487 17.5858 9.23438C17.399 9.38932 17.2007 9.52832 16.9911 9.65137C16.7814 9.76986 16.508 9.88151 16.1708 9.98633C15.8381 10.0866 15.494 10.1367 15.1385 10.1367C14.1861 10.1367 13.3635 9.78809 12.6708 9.09082C11.9826 8.389 11.6385 7.54818 11.6385 6.56836C11.6385 5.625 11.9735 4.81836 12.6434 4.14844C13.3179 3.47396 14.1245 3.13672 15.0633 3.13672C16.0067 3.13672 16.7906 3.45117 17.4149 4.08008C18.0438 4.70443 18.3583 5.48828 18.3583 6.43164L18.2831 7.12891ZM15.0633 4.33301C14.5575 4.33301 14.1314 4.4834 13.785 4.78418C13.4432 5.0804 13.2131 5.46549 13.0946 5.93945H16.9842C16.9022 5.46549 16.6903 5.0804 16.3485 4.78418C16.0067 4.4834 15.5783 4.33301 15.0633 4.33301ZM23.2528 6.5L25.7684 10H24.162L22.412 7.55273L20.662 10H19.0487L21.5712 6.5L19.2606 3.28027H20.8671L22.412 5.44727L23.9501 3.28027H25.5633L23.2528 6.5ZM27.3817 10V0.197266H31.5106C32.4175 0.197266 33.1695 0.486654 33.7665 1.06543C34.3635 1.64421 34.662 2.3597 34.662 3.21191C34.662 3.61296 34.5936 3.98893 34.4569 4.33984C34.3202 4.6862 34.1561 4.95964 33.9647 5.16016C33.7733 5.36068 33.5819 5.53613 33.3905 5.68652C33.1991 5.83691 33.035 5.93945 32.8983 5.99414L32.7001 6.08301L34.9422 10H33.2606L31.162 6.21973H28.9198V10H27.3817ZM32.6522 4.36035C32.9621 4.05046 33.1171 3.66764 33.1171 3.21191C33.1171 2.75163 32.9621 2.36882 32.6522 2.06348C32.3469 1.75358 31.9663 1.59863 31.5106 1.59863H28.9198V4.81836H31.5106C31.9663 4.81836 32.3469 4.66569 32.6522 4.36035ZM42.9198 7.12891H37.6698C37.7427 7.60286 37.9751 8.01302 38.3671 8.35938C38.7635 8.70573 39.2329 8.87891 39.7753 8.87891C40.1672 8.87891 40.5318 8.79004 40.869 8.6123C41.2108 8.43457 41.4523 8.26139 41.5936 8.09277L41.8055 7.83301L42.7147 8.74219C42.6874 8.77865 42.6441 8.83105 42.5848 8.89941C42.5301 8.96322 42.4094 9.07487 42.2225 9.23438C42.0357 9.38932 41.8374 9.52832 41.6278 9.65137C41.4182 9.76986 41.1447 9.88151 40.8075 9.98633C40.4748 10.0866 40.1307 10.1367 39.7753 10.1367C38.8228 10.1367 38.0002 9.78809 37.3075 9.09082C36.6193 8.389 36.2753 7.54818 36.2753 6.56836C36.2753 5.625 36.6102 4.81836 37.2801 4.14844C37.9546 3.47396 38.7613 3.13672 39.7001 3.13672C40.6434 3.13672 41.4273 3.45117 42.0516 4.08008C42.6805 4.70443 42.995 5.48828 42.995 6.43164L42.9198 7.12891ZM39.7001 4.33301C39.1942 4.33301 38.7681 4.4834 38.4217 4.78418C38.0799 5.0804 37.8498 5.46549 37.7313 5.93945H41.621C41.5389 5.46549 41.327 5.0804 40.9852 4.78418C40.6434 4.4834 40.215 4.33301 39.7001 4.33301ZM49.9198 10H48.5184V9.30273C48.5002 9.32096 48.4683 9.35059 48.4227 9.3916C48.3817 9.43262 48.2951 9.50098 48.163 9.59668C48.0353 9.68783 47.8964 9.77214 47.746 9.84961C47.5956 9.92253 47.4064 9.98861 47.1786 10.0479C46.9507 10.1071 46.7206 10.1367 46.4881 10.1367C45.8046 10.1367 45.2372 9.93848 44.786 9.54199C44.3348 9.14551 44.1092 8.69206 44.1092 8.18164C44.1092 7.63021 44.2824 7.16764 44.6288 6.79395C44.9797 6.42025 45.4582 6.18327 46.0643 6.08301L48.5184 5.65918C48.5184 5.30371 48.3863 5.00521 48.1219 4.76367C47.8622 4.52214 47.5272 4.40137 47.1171 4.40137C46.7616 4.40137 46.438 4.47656 46.1464 4.62695C45.8592 4.77279 45.661 4.9209 45.5516 5.07129L45.3671 5.31055L44.4579 4.40137C44.4852 4.36491 44.5217 4.31934 44.5672 4.26465C44.6174 4.2054 44.7245 4.10514 44.8885 3.96387C45.0572 3.81803 45.2349 3.68815 45.4217 3.57422C45.6086 3.46029 45.8547 3.36003 46.16 3.27344C46.4699 3.18229 46.7889 3.13672 47.1171 3.13672C47.9374 3.13672 48.6096 3.38053 49.1337 3.86816C49.6577 4.35124 49.9198 4.94824 49.9198 5.65918V10ZM46.7001 8.87891C47.2697 8.87891 47.7141 8.71029 48.0331 8.37305C48.3566 8.03125 48.5184 7.5459 48.5184 6.91699V6.78027L46.3446 7.12891C46.0939 7.17448 45.8911 7.27702 45.7362 7.43652C45.5812 7.59603 45.5038 7.79655 45.5038 8.03809C45.5038 8.26139 45.6109 8.45736 45.8251 8.62598C46.0438 8.7946 46.3355 8.87891 46.7001 8.87891ZM53.4198 0.197266V10H52.0253V0.197266H53.4198ZM56.9881 3.28027V10H55.5868V3.28027H56.9881ZM56.8924 0.580078C57.0519 0.739583 57.1317 0.940104 57.1317 1.18164C57.1317 1.42318 57.0519 1.6237 56.8924 1.7832C56.7329 1.94271 56.5324 2.02246 56.2909 2.02246C56.0493 2.02246 55.8488 1.94271 55.6893 1.7832C55.5298 1.6237 55.4501 1.42318 55.4501 1.18164C55.4501 0.940104 55.5298 0.739583 55.6893 0.580078C55.8488 0.420573 56.0493 0.34082 56.2909 0.34082C56.5324 0.34082 56.7329 0.420573 56.8924 0.580078ZM59.8592 2.43945V1.03809H61.1171V3.28027H62.5184V4.53809H61.1171V8.02441C61.1171 8.27507 61.1968 8.48014 61.3563 8.63965C61.5158 8.79915 61.7163 8.87891 61.9579 8.87891C62.0627 8.87891 62.1721 8.86751 62.286 8.84473C62.4045 8.82194 62.4956 8.79688 62.5594 8.76953L62.662 8.74219V10C62.384 10.0911 62.0559 10.1367 61.6776 10.1367C60.3697 10.1367 59.718 9.43717 59.7225 8.03809V4.53809H58.4579V3.28027H59.162C59.6268 3.28027 59.8592 3 59.8592 2.43945ZM65.9501 10.6973L66.2303 10L63.496 3.28027H64.9657L66.9276 8.18164L68.8895 3.28027H70.3592L67.3446 10.6973C66.9982 11.5267 66.6542 12.1077 66.3124 12.4404C65.9751 12.7731 65.5513 12.9395 65.0409 12.9395C64.854 12.9395 64.6786 12.9281 64.5145 12.9053C64.3504 12.8825 64.2297 12.8574 64.1522 12.8301L64.0565 12.8027V11.5381C64.2889 11.6292 64.5236 11.6771 64.7606 11.6816C65.2938 11.6771 65.6903 11.349 65.9501 10.6973Z" fill="#FAB412"/>
                    </svg>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    {{__('Дашборд')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="{{route('projects.projects')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    {{__('Проекты')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="{{route('tasks.tasks')}}">
                                    <svg enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" class="feather feather-file-text"><g><path d="m3.5 7h-2c-.827 0-1.5-.673-1.5-1.5v-2c0-.827.673-1.5 1.5-1.5h2c.827 0 1.5.673 1.5 1.5v2c0 .827-.673 1.5-1.5 1.5zm-2-4c-.275 0-.5.225-.5.5v2c0 .275.225.5.5.5h2c.275 0 .5-.225.5-.5v-2c0-.275-.225-.5-.5-.5z"/></g><g><path d="m3.5 15h-2c-.827 0-1.5-.673-1.5-1.5v-2c0-.827.673-1.5 1.5-1.5h2c.827 0 1.5.673 1.5 1.5v2c0 .827-.673 1.5-1.5 1.5zm-2-4c-.275 0-.5.225-.5.5v2c0 .275.225.5.5.5h2c.275 0 .5-.225.5-.5v-2c0-.275-.225-.5-.5-.5z"/></g><g><path d="m3.5 23h-2c-.827 0-1.5-.673-1.5-1.5v-2c0-.827.673-1.5 1.5-1.5h2c.827 0 1.5.673 1.5 1.5v2c0 .827-.673 1.5-1.5 1.5zm-2-4c-.275 0-.5.225-.5.5v2c0 .275.225.5.5.5h2c.275 0 .5-.225.5-.5v-2c0-.275-.225-.5-.5-.5z"/></g><g><path d="m23.5 5h-16c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h16c.276 0 .5.224.5.5s-.224.5-.5.5z"/></g><g><path d="m23.5 13h-16c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h16c.276 0 .5.224.5.5s-.224.5-.5.5z"/></g><g><path d="m23.5 21h-16c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h16c.276 0 .5.224.5.5s-.224.5-.5.5z"/></g></svg>
                                    {{__('Задачи')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="#">
                                    <svg height="24" viewBox="0 0 32 32" width="24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" data-name="Layer 5"><path d="m26 27h-10a1 1 0 0 0 0 2h10a3 3 0 0 0 3-3v-20a3 3 0 0 0 -3-3h-20a3 3 0 0 0 -3 3v1a1 1 0 0 0 2 0v-1a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v4h-23a1 1 0 0 0 -1 1v15a3 3 0 0 0 3 3h6a1 1 0 0 0 1-1v-16h14v14a1 1 0 0 1 -1 1zm-15 0h-5a1 1 0 0 1 -1-1v-14h6z"/></svg>
                                    {{__('Шаблон')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="{{route('staff.staff')}}">
                                    <svg id="Icons" height="24" viewBox="0 0 74 74" width="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" xmlns="http://www.w3.org/2000/svg"><path d="m22.5 49.36h-19.5a1 1 0 0 1 -1-1v-4.5a9.911 9.911 0 0 1 9.9-9.9h9.38a9.848 9.848 0 0 1 9.767 8.322 1 1 0 0 1 -1.975.316 7.856 7.856 0 0 0 -7.792-6.638h-9.38a7.909 7.909 0 0 0 -7.9 7.9v3.5h18.5a1 1 0 0 1 0 2z"/><path d="m16.587 31.081a7.746 7.746 0 1 1 7.745-7.746 7.754 7.754 0 0 1 -7.745 7.746zm0-13.491a5.746 5.746 0 1 0 5.745 5.745 5.752 5.752 0 0 0 -5.745-5.745z"/><path d="m71 49.36h-19.5a1 1 0 0 1 0-2h18.5v-3.5a7.909 7.909 0 0 0 -7.9-7.9h-9.38a7.856 7.856 0 0 0 -7.792 6.64 1 1 0 0 1 -1.975-.316 9.848 9.848 0 0 1 9.767-8.324h9.38a9.911 9.911 0 0 1 9.9 9.9v4.5a1 1 0 0 1 -1 1z"/><path d="m57.413 31.081a7.746 7.746 0 1 1 7.746-7.746 7.755 7.755 0 0 1 -7.746 7.746zm0-13.491a5.746 5.746 0 1 0 5.746 5.745 5.751 5.751 0 0 0 -5.746-5.745z"/><path d="m52.325 57.41h-30.65a1 1 0 0 1 -1-1v-4.072a11.049 11.049 0 0 1 11.037-11.038h10.576a11.049 11.049 0 0 1 11.037 11.038v4.072a1 1 0 0 1 -1 1zm-29.65-2h28.65v-3.072a9.047 9.047 0 0 0 -9.037-9.038h-10.576a9.047 9.047 0 0 0 -9.037 9.037z"/><path d="m37 37.8a8.609 8.609 0 1 1 8.608-8.609 8.617 8.617 0 0 1 -8.608 8.609zm0-15.22a6.609 6.609 0 1 0 6.608 6.608 6.615 6.615 0 0 0 -6.608-6.608z"/></svg>
                                    {{__('Сотрудники')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="{{route('clients.clients')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    {{__('Клиенты')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="{{route('reports.reports')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                    {{__('Отчетность')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center ms-2" aria-current="page" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><path d="M32,1a1,1,0,0,0-1,1V5.025A27.028,27.028,0,0,0,5.025,31H2a1,1,0,0,0-1,1A31,31,0,1,0,32,1Zm1,2.017A29.039,29.039,0,0,1,60.983,31H33ZM27,56.5c-.678-.138-1.343-.31-2-.5V49h2Zm4,.478c-.674-.027-1.341-.082-2-.161V41h2ZM33,45h2V56.814c-.659.079-1.326.134-2,.161Zm4,4h2V56c-.657.192-1.322.364-2,.5Zm3-2H37V44a1,1,0,0,0-1-1H33V40a1,1,0,0,0-1-1H28a1,1,0,0,0-1,1v7H24a1,1,0,0,0-1,1v7.317a25.063,25.063,0,0,1-7.946-4.957L32,33.414,48.946,50.36A25.063,25.063,0,0,1,41,55.317V48A1,1,0,0,0,40,47Zm10.36,1.946L34.414,33H56.975A24.906,24.906,0,0,1,50.36,48.946ZM31,7.025V31.586L13.64,48.946A24.98,24.98,0,0,1,31,7.025ZM32,61A29.036,29.036,0,0,1,3.017,33H5.025a26.993,26.993,0,0,0,53.95,0h2A29.031,29.031,0,0,1,32,61Z"/><path d="M46,18h2a3,3,0,0,0-3-3V14H43v1a3,3,0,0,0,0,6v2a1,1,0,0,1-1-1H40a3,3,0,0,0,3,3v1h2V25a3,3,0,0,0,0-6V17A1,1,0,0,1,46,18Zm0,4a1,1,0,0,1-1,1V21A1,1,0,0,1,46,22Zm-3-3a1,1,0,0,1,0-2Z"/><path d="M19,28H17a3,3,0,0,0,3,3v1h2V31a3,3,0,0,0,0-6V23a1,1,0,0,1,1,1h2a3,3,0,0,0-3-3V20H20v1a3,3,0,0,0,0,6v2A1,1,0,0,1,19,28Zm0-4a1,1,0,0,1,1-1v2A1,1,0,0,1,19,24Zm3,3a1,1,0,0,1,0,2Z"/><path d="M44,11a9,9,0,1,0,9,9A9.01,9.01,0,0,0,44,11Zm0,16a7,7,0,1,1,7-7A7.008,7.008,0,0,1,44,27Z"/></svg>
                                    {{__('Финансы')}}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown user-select-none">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(Auth::user()->photo !== null)
                                        <img class="me-2" src="{{asset('files/image/staff/'.Auth::user()->photo)}}" width="25" alt="">
                                    @else
                                        <img class="me-2" src="{{asset('files/image/staff/basic-photo.svg')}}" width="25" alt="">
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item disabled" >
                                            {{Auth::user()->profession }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item disabled" >
                                            {{Auth::user()->surname }} {{Auth::user()->name }} {{Auth::user()->patronymic }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item disabled" >
                                            {{Auth::user()->email }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('profile.profile')}}">
                                            {{ __('Профиль') }}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Выход') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
{{--    <script src="{{ asset('js/particles.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/part-app.js') }}" defer></script>--}}
</body>
</html>
