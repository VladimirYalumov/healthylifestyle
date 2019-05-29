<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .gradient{
            background: -webkit-linear-gradient(#a4e786, #5ad427);
            background: -o-linear-gradient(#a4e786, #5ad427);
            background: -moz-linear-gradient(#a4e786, #5ad427);
            background: linear-gradient(to right, #3d68bf, #0d1423);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: #3d3d3e; padding: 5px;">

        <a class="navbar-brand" href="#">Trainer Online</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class = "navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="link nav-link"> @lang('content.nav_main') </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('programs') }}" class="link nav-link"> @lang('content.nav_programs') </a>
                </li>
            </ul>

            @guest
            <ul class = "navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('content.nav_lang')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://healthylifestyle.local/setlocale/ru">Русский</a>
                        <a class="dropdown-item" href="http://healthylifestyle.local/setlocale/en">English</a>
                    </div>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="link nav-link">@lang('content.nav_registration')</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="link nav-link">@lang('content.nav_login')</a>
                </li>
            </ul>
            @else
            <ul class = "navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('content.nav_lang')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="http://healthylifestyle.local/setlocale/ru">Русский</a>
                        <a class="dropdown-item" href="http://healthylifestyle.local/setlocale/en">English</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="link nav-link">@lang('content.nav_home')</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="link nav-link">@lang('content.nav_logaut')</a>
                </li>
            </ul>
            @endguest
        </div>
    </nav>

    <main class="gradient" style="padding: 15px; ">
        @yield('content')
    </main>



    <footer class="page-footer font-smallpt-4" style="background-color: #3d3d3e; color: whitesmoke; padding: 5px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-xs-12">
            <h5 class="font-weight-bold">Контакты</h5>
            <ul  class="list-unstyled">
                <li>Телефон: +7 978 032 53 93</li>
                <li>Email: vladimir.ylmv@gmail.com</li>
            </ul>
        </div>

        <div class="col-md-6 col-xs-12">
          <h5 class="font-weight-bold">Следите за нами</h5>
            <ul class="list-unstyled">
                <li>
                    <a href="https://vk.com/public181681950" style="color: whitesmoke;">ВКонтакте</a>
                </li>

                <li class="list-inline-item">
                  <a class="btn btn-social-icon btn-sm btn-facebook">
                    <span class="fa fa-facebook"></span>
                  </a>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center" style="padding: 5px;">© 2018 Copyright: Все права защищены</div>
  </footer>
</body>
</html>
