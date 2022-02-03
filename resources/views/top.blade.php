<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- color #EE827D -->
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: rgba(201, 177, 112, 0.4);">
            <div class="container-fluid">
                <a class="navbar-brand text-primary fs-2" href="#" style="font-family: 'Lobster', cursive;">Love
                    Diary</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-primary fs-5" aria-current="page" href="{{ route('register') }}">新規作成</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary fs-5" href="{{ route('login') }}">ログイン</a>
                        </li>
                    </ul>
                    <!-- <button type="button" class="btn btn-outline-primary me-2">ログイン</button>
                    <button type="button" class="btn btn-primary">サインアップ</button> -->
                </div>
            </div>
        </nav>
    </header>
    <!-- main -->
    <div class="bg-image position-relative">
        <div class="container-fluid text-center position-absolute top-50 start-50 translate-middle">
            <p class="fs-2 mb-sm-2">カップル・夫婦のための交換日記</p>
            <p class="fs-1 m-0" style="font-family: 'Lobster', cursive;">Love Diary</p>
            <p class="fs-5 pb-sm-3">~愛するあの人と秘密の交換日記をしよう~</p>
            <p>日記で日々を綴り</p>
            <p>相手へ思いを紡ごう</p>
            <p>少しのコミュニケーションで恋は変わる</p>
            <button type="submit" class="btn btn-lg btn-outline-primary">無料でサインアップ</button>
        </div>
    </div>
    <!-- slideshow -->
    <div class="slideshow">
        <div class="container">
            <p class="fs-1 text-center">機能</p>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="./attach/img/sample1.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./attach/img/sample.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./attach/img/600X300.gif" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="card-footer fixed-bottom row">
        <div class="col-sm-6" style="text-align: right;">
            <a href="#" class="text-reset">規約</a>
        </div>
        <div class="col-sm-4" style="text-align: left;">
            <a href="#" class="text-reset">リリースノート</a>
        </div>
        <div class="col-sm-2" style="text-align: right;">
            <small>&copy; 2021 うどんなん</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="attach/js/script.js"></script>
</body>

</html>