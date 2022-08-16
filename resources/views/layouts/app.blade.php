<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ mix('js/script.js') }}" defer></script>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/ac133b1636.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{!! asset("css/$theme_css") !!}" rel="stylesheet">
</head>

<body>
    {{-- @php
        $tag1 = $tags[0];
        $tag2 = $tags[1];
    @endphp --}}
    <div id="app">
        @include('components.header')

        <main class="main">
            @include('components.success_message')
            @include('components.error_message')

            <div class="row">
                <div class="card-group">
                    <div class="card calendar" style="min-height: 100vh;">
                        {{-- カレンダー --}}
                        @include('components.calendar')
                    </div>
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- モーダル --}}
    {{-- アカウント設定 --}}
    @include('modal.user_setting')
    {{-- ウィジェット設定 --}}
    @include('modal.widgets_setting')
    {{-- マイプロフィール --}}
    @include('modal.my_profile')
    @if (!isset($user['partner_id']))
        {{-- パートナー招待 --}}
        @include('modal.invitation_modal')
    @else
        {{-- パートナープロフィール --}}
        @include('modal.partner_profile')
    @endif

</body>

</html>
