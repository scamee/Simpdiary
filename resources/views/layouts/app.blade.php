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
    <script src="{{ asset('js/script.js') }}" defer></script>
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/ac133b1636.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @php
        $tag1 = $tags[0];
        $tag2 = $tags[1];
    @endphp
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary fs-2" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <button type="button" class="dropdown-item" data-bs-target="#UserSettingModel"
                                        data-bs-toggle="modal">
                                        アカウント設定
                                    </button>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            @endif
            {{-- @error('set_day')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row" {{-- style='height: 92vh;' --}}>
                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ $prev }}">&lt;</a>
                            <span class="month">{{ $month }}</span>
                            <a href="{{ $next }}">&gt;</a>
                        </div>
                        <div class="card-body py-2 px-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>日</th>
                                    <th>月</th>
                                    <th>火</th>
                                    <th>水</th>
                                    <th>木</th>
                                    <th>金</th>
                                    <th>土</th>
                                </tr>
                                @foreach ($weeks as $week)
                                    {!! $week !!}
                                @endforeach
                            </table>
                        </div>
                        {{-- タグ --}}
                        <div id="tags">
                            <div class="card-body bg-transparent p-0">
                                <h4 class="card-title">tags</h4>
                                <button class="btn btn-outline-primary" data-bs-target="#TagSettingModel"
                                    data-bs-toggle="modal">
                                    <i class="me-1 fa-solid fa-pen"></i>
                                </button>
                            </div>
                            <div class="card-footer bg-transparent p-0">
                                <div class="row m-0">
                                    <div class="col-6 px-1">
                                        <div class="card card-body tag p-0">
                                            {{ $tag1->title }}<br>
                                            <span style="font-size:35px;">{{ $diff[0] }}</span>Days
                                        </div>
                                    </div>
                                    <div class="col-6 px-1">
                                        <div class="card card-body tag p-0">
                                            {{ $tag2['title'] }}<br>
                                            <span style="font-size:35px;">{{-- {{ $diff2 }} --}}</span>Days
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" card">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- アカウント設定 --}}
    <div class="modal fade" id="UserSettingModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title" id="Title">アカウント設定</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <ul class="setting-list p-2">
                        <li>
                            <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse"
                                href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i class="me-1 fa-solid fa-pen"></i>
                            </a>
                            <h4>ユーザー名</h4>
                            <p>あなたのユーザー名:
                                <span class="border-bottom border-primary border-2">{{ $user->name }}</span>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <form action="#">
                                    @csrf
                                    <label class="form-label" for="username">新しいユーザー名</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $user->name }}">
                                    <button type="submit" class="btn btn-outline-primary">保存</button>
                                </form>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse"
                                href="#collapseExample2" role="button" aria-expanded="false"
                                aria-controls="collapseExample2">
                                <i class="me-1 fa-solid fa-pen"></i>
                            </a>
                            <h4>パスワード</h4>
                            <p>ログインパスワードを変更します</p>
                            <div class="collapse" id="collapseExample2">
                                <form action="#">
                                    @csrf
                                    <label class="form-label" for="currentPassword">現在のパスワード</label>
                                    <input type="text" class="form-control" id="currentPassword"
                                        name="currentpassword" value="{{ $user->name }}">
                                    <label class="form-label" for="newPassword">新しいパスワード</label>
                                    <input type="text" class="form-control" id="newPassword" name="newpassword"
                                        value="{{ $user->name }}">
                                    <label class="form-label" for="newPasswordAgain">新しいパスワード(再度)</label>
                                    <input type="text" class="form-control" id="newPasswordAgain"
                                        name="newpasswordAgain" value="{{ $user->name }}">
                                    <button type="submit" class="btn btn-outline-primary">保存</button>
                                </form>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse"
                                href="#collapseExample3" role="button" aria-expanded="false"
                                aria-controls="collapseExample3">
                                <i class="me-1 fa-solid fa-pen"></i>
                            </a>
                            <h4>記念日</h4>
                            <p>
                                現在の記念日:<span class="border-bottom border-primary border-2">{{ $date }}</span>
                            </p>
                            <div class="collapse" id="collapseExample3">
                                <div class="">
                                    <form method='POST' action="#">
                                        @csrf
                                        <label class="form-label" for="currentPassword">現在のパスワード</label>
                                        <input type="text" class="form-control" id="currentPassword"
                                            name="currentpassword" value="{{ $date }}">
                                        <button type="submit" class="btn btn-outline-primary">保存</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    {{-- タグ設定 --}}
    <div class="modal fade" id="TagSettingModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h4 class="modal-title" id="Title">タグ設定</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <ul class="setting-list p-2">
                        <li>
                            <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseTag1"
                                role="button" aria-expanded="false" aria-controls="collapseTag1">
                                <i class="me-1 fa-solid fa-pen"></i>
                            </a>
                            <h4>タグ1</h4>
                            <p>タイトル:
                                <span class="border-bottom border-primary border-2">{{ $tag1['title'] }}</span>
                            </p>
                            <p>日付:
                                <span class="border-bottom border-primary border-2">{{ $tag1['set_day'] }}</span>
                            </p>
                            <div class="collapse" id="collapseTag1">
                                <form method='POST' action="/tagupdate">
                                    @csrf
                                    {{-- <input type="hidden" name="id" value="{{ $tags[0]['id'] }}"> --}}
                                    <label class="form-label" for="tag1-title">タイトル</label>
                                    <input type="text" class="form-control" id="tag1-title" name="tag-title"
                                        value="{{ $tag1['title'] }}">
                                    <label class="form-label" for="tag1-setday">日付 (例)2000-12-01[yyyy-mm-dd]</label>
                                    <input type="text" class="form-control" id="tag1-setday" name="tag-setday"
                                        value="{{ $tag1['set_day'] }}">
                                    <button type="submit" class="btn btn-outline-primary">保存</button>
                                </form>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseTag2"
                                role="button" aria-expanded="false" aria-controls="collapseTag2">
                                <i class="me-1 fa-solid fa-pen"></i>
                            </a>
                            <h4>タグ2</h4>
                            <p>タイトル:
                                <span class="border-bottom border-primary border-2">{{ $tag1['title'] }}</span>
                            </p>
                            <p>日付:
                                <span class="border-bottom border-primary border-2">{{ $tag1['set_day'] }}</span>
                            </p>
                            <div class="collapse" id="collapseTag2">
                                <form method='POST' action="/tagupdate">
                                    @csrf
                                    {{-- <input type="hidden" name="id" value="{{ $tag1[1]['id'] }}"> --}}
                                    <label class="form-label" for="tag2-title">タイトル</label>
                                    <input type="text" class="form-control" id="tag2-title" name="tag-title"
                                        value="{{ $tag1['title'] }}">
                                    <label class="form-label" for="tag2-setday">日付(yyyy-mm-dd:例2000-12-01)</label>
                                    <input type="text" class="form-control" id="tag2-setday" name="tag-setday"
                                        value="{{ $tag1['set_day'] }}">
                                    <button type="submit" class="btn btn-outline-primary">保存</button>
                                </form>
                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="MyListModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">自分の日記{{ $date }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-edit" data-bs-target="#EditModel" data-bs-toggle="modal"
                                data-bs-dismiss="modal">編集</button>
                            <div class="row">
                                <div class="col-sm-2 col-4">
                                    <h3 class="m-0">タイトル</h3>
                                </div>
                                <div class="col-sm-10 col-8">
                                    <p class="m-0">...</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <h3>体調</h3>
                        <p>...</p>
                        <hr>
                    </div>
                    <h3>本文</h3>
                    <p>...</p>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#MyListModel" data-bs-toggle="modal"
                        data-bs-dismiss="modal" disabled>自分の日記</button>
                    <button class="btn btn-primary" data-bs-target="#PartnerListModel" data-bs-toggle="modal"
                        data-bs-dismiss="modal">相手の日記</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 日記確認画面 相手 --}}
    <div class="modal fade" id="PartnerListModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">相手の日記</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>タイトル</h3>
                    <p>...</p>
                    <hr>
                    <h3>体調</h3>
                    <p>...</p>
                    <hr>
                    <h3>本文</h3>
                    <p>...</p>
                    <hr>
                    <br><br><br><br><br><br><br><br><br><br>
                    <p>Just like that.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#MyListModel" data-bs-toggle="modal"
                        data-bs-dismiss="modal">自分の日記</button>
                    <button class="btn btn-primary" data-bs-target="#PartnerListModel" data-bs-toggle="modal"
                        data-bs-dismiss="modal" disabled>相手の日記</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 編集画面 --}}
    <div class="modal fade" id="EditModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">編集画面</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" method='POST' action="">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label" name="">タイトル</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="select" class='form-label'>体調</label>
                            <select id='select' class='form-control' name=''>
                                <option value="">
                                    --選択してください--
                                </option>
                                <option value="good">
                                    良い
                                </option>
                                <option value="normal">
                                    普通
                                </option>
                                <option value="bad">
                                    悪い
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">内容</label>
                            <textarea name="" id="content" rows="10" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#MyListModel" data-bs-toggle="modal"
                        data-bs-dismiss="modal">戻る</button>
                    <button type="submit" class="btn btn-primary" form="form">保存</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="bd-example">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MyListModel">
            日記を見る
        </button>
    </div>

</body>

</html>
