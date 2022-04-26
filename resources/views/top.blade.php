<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary fs-2" href="{{ url('/') }}"
                    style="font-family: 'Lobster', cursive;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-primary fs-5" aria-current="page"
                                href="{{ route('register') }}">新規作成</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary fs-5" href="{{ route('login') }}">ログイン</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- main -->
        <div class="top-main">
            <div class="container">
                <p class="title">シンプル<span>な</span>交換日記アプリ</p>
                <p class="appname">{{ config('app.name', 'Laravel') }}</p>
                <p class="sub-title">~2人だけの秘密の交換日記をしよう~</p>
                <p>日記で日々を綴り</p>
                <p>相手へ思いを紡ごう</p>
                @guest
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-lg button">無料でサインアップ</button>
                    </a>
                @else
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-lg button">{{ Auth::user()->name }}でログイン中</button>
                    </a>
                @endguest
            </div>
        </div>
        <!-- slideshow -->
        <div class="slideshow">
            <div class="container">
                <p class="introduction">機能紹介</p>
                <div id="slideshow" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#slideshow" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            {{-- pc用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop1-pc.png') }}" class="pc w-100"
                                alt="desktop1">
                            {{-- スマホ用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop1-sp.png') }}" class="sp w-100"
                                alt="desktop1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>カレンダーで日記を管理</h5>
                                <p style="color: grey;">カレンダー形式で日記を保存するのでシンプルで管理がしやすい！</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            {{-- pc用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop2-pc.png') }}" class="pc w-100"
                                alt="desktop2">
                            {{-- スマホ用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop2-sp.png') }}" class="sp w-100"
                                alt="desktop1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>日記表示画面</h5>
                                <p style="color: grey;">その日の体調や画像を保存できて見返した時にわかりやすい！</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            {{-- pc用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop3-pc.png') }}" class="pc w-100"
                                alt="desktop2">
                            {{-- スマホ用画像 --}}
                            <img src="{{ asset('img/slideshow-desktop3-sp.png') }}" class="sp w-100"
                                alt="desktop1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>ウィジェット搭載</h5>
                                <p style="color: grey;">ウィジェット付きなので、記念日や予定日までの日付が一目でわかる！</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slideshow"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slideshow"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="pc">
                <a href="https://github.com/scamee/Proto_diary" class="text-reset">Github</a>
            </div>
            <div>
                <small>&copy; 2022 まきまき</small>
            </div>
        </footer>
    </div>
</body>

</html>
