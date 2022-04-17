<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fs-2" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                        <a id="accountDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            アカウント情報<i class="fa-solid fa-user"></i></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <button type="button" class="dropdown-item" data-bs-target="#MyProfileModel"
                                data-bs-toggle="modal">
                                マイプロフィール
                            </button>
                            @if (isset($user['partner_id']))
                                <button type="button" class="dropdown-item" data-bs-target="#PatnerProfileModel"
                                    data-bs-toggle="modal">
                                    相手のプロフィール
                                </button>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="settingDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            設定<i class="fa-solid fa-gear"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="settingDropdown">
                            <button type="button" class="dropdown-item" data-bs-target="#UserSettingModel"
                                data-bs-toggle="modal">
                                アカウント設定
                            </button>
                            @if (!isset($user['partner_id']))
                                <button type="button" class="dropdown-item" data-bs-target="#InvitationModel"
                                    data-bs-toggle="modal">
                                    パートナーと日記を共有
                                </button>
                            @endif
                            <button type="button" class="dropdown-item" data-bs-target="#TagSettingModel"
                                data-bs-toggle="modal">
                                ウィジェット設定
                            </button>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}<i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
