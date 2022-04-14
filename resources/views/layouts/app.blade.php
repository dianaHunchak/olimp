<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Olimp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/crumina-fonts.css') }}">



     @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Навігація</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Olimp') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Вхід</a></li>
                            <li><a href="{{ route('register') }}">Реєстрація</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Вийти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                     </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

         <div class="container">
             <div class="row">

                @if(auth::check())

                 <div class="col-lg-3">
                     <ul class="list-group">

                        <li class="list-group-item">
                        
                         <a href="{{ route('dashboard') }}">Домашня</a>
                        </li>

                        <li class="list-group-item">
                        <i class="seoicon-shape-heart-bold"></i>
                             <a href="{{ route('user.profile') }}">Мій профіль</a>
                         </li>

                         <li class="list-group-item">
                            <i class="seoicon-shapes"></i>
                            <a href="{{ route('categories') }}">Всі категорії</a>
                         </li>

                         <li class="list-group-item">
                            <i class="seoicon-cross"></i>
                             <a href="{{ route('category.create') }}">Створити нову категорію</a>
                         </li>

                         <li class="list-group-item">
                            <i class="seoicon-text-paper"></i>
                            <a href="{{ route('posts') }}">Всі статті</a>
                         </li>

                         @if(Auth::user()->admin)
                         <li class="list-group-item">
                            <i class="seoicon-commerce"></i>
                            <a href="{{ route('posts.trashed') }}">Статті в корзині</a>
                         </li>
                         @endif

                         <li class="list-group-item">
                             <i class="seoicon-cross"></i>
                             <a href="{{ route('post.create') }}">Створити нову статтю</a>
                         </li>                         

                         <li class="list-group-item">
                            <i class="seoicon-tags"></i>
                             <a href="{{ route('tags') }}">Всі теги</a>
                         </li> 
                         
                         <li class="list-group-item">
                            <i class="seoicon-cross"></i>
                             <a href="{{ route('tag.create') }}">Створити новий тег</a>
                         </li>   

                         @if(Auth::user()->admin)
                         <li class="list-group-item">
                            <i class="seoicon-social-links"></i>
                            <a href="{{ route('users') }}">Користувачі</a>
                         </li>
                         <li class="list-group-item">
                            <i class="seoicon-cross"></i>
                             <a href="{{ route('user.create') }}">Створити нового користувача</a>
                         </li>

                         @endif

                         @if(Auth::user()->admin)

                          <li class="list-group-item">
                             <i class="seoicon-settings-symbol-with-up-arrow-in-a-circle"></i>
                             <a href="{{ route('settings') }}">Налаштування блогу</a>
                         </li>
                         @endif

                         <li class="list-group-item">
                            <i class="seoicon-arrow-back"></i>
                            <a href="{{ route('index') }}">Повернутись на головну</a>
                         </li>


                     </ul>
                 </div>

                 @endif

                 <div class="col-lg-8">

                       
                     @yield('content')
                 </div>
             </div>
         </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

     <script>
          @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
          @endif
          @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}")
          @endif
     </script>

     @yield('scripts')
</body>
</html>
