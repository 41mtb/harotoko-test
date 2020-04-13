<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'harotoko') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div id="app">
        <nav class="navbar col-md-8 offset-md-2 navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class='logo' src="{{asset('/images/global/logo.png')}}" alt="image">
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mypage') }}">マイページ</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4  col-md-8 offset-md-2 mb-5">
            @yield('content')
        </main>
    </div>
        <!-- Footer -->
        <footer>
            <div class="container col-md-8 offset-md-2 ">
                <div class="row">
                    <div class="col-md-3 footer-contact wow fadeInDown">
                        <h3>Company</h3>
                        <p>株式会社Daft</p>
                    </div>
                    <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
                        <h3>Contact</h3>
                        <p>神戸市垂水区本多聞3丁目11-11</p>
                        <p>Phone: (078) 600 2283</p>
                        <p>Email: <a href="mailto:info@info@tellad.jp">info@tellad.jp</a></p>
                    </div>
                    <div class="col-md-4 footer-links wow fadeInUp">
                        <div class="row">
                            <div class="col">
                                <h3>Links</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="m-1"><a href="/news">お知らせ</a></p>
                                <p class="m-1"><a href="/company">会社概要</a></p>
                                <p class="small m-1"><a href="/privacy">プライバシーポリシー</a></p>
                                <p class="m-1"><a href="https://form.run/@tellad-contact">お問い合わせ</a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="m-1"><a href="/terms">利用規約</a></p>
                                <p class="m-1"><a href="/usage">利用方法</a></p>
                                <p class="m-1"><a href="/faq">よくある質問</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            &copy; 2020 Tellad 運営 株式会社 Daft</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
