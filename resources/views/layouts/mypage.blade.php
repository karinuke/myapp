<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/mypage.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    
                    <a class="navbar-brand header_logo" href="{{ url('/') }}">
                        <img src="{{ secure_asset('image/logo_transparent.png') }}">
                    </a>
                    {{--aとdivはリンクタグかブロックかで違う--}}
                    
                    <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
                    <!--    <span class="navbar-toggler-icon"></span>-->
                    <!--</button>-->
                    
                    <div class="header_title"> 
                       <p>Well Eats</p>
                    </div>  

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                           
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="キーワードを入力">
                                <button class="btn btn-danger" type="button" id="button-addon2"><i class="fas fa-search"></i> search </button>
                            </div>
                           
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">
                             <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   MyPage 
                                 </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mypage.profile.index') }}">
                                        登録情報
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mypage.recipe.index') }}">
                                        投稿したレシピ一覧
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    </a>
                                        
                                </div>
                            </li>
                            @endguest
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>