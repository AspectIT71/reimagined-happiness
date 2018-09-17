<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <a href="{{route('index')}}"><img class="logo" src="/image/logo.png" alt=""></a>
        <ul class="topNav">
            @foreach($menu as $value)
             <a href="{{route('category.show',$value->slug)}}"><li class="topNavItem">{{$value->title}}</li></a>
            @endforeach
        </ul>
        <div class="userStatus">
            @if(Auth::check())
                Привет <span>{{Auth::user()->name}}</span>
                <a href="/logout">Выйти</a>
            @else
                <a href="/login" class="login"><img src="/image/login.png" width="30px" alt=""></a>
            @endif
        </div>
        <div class="burgerIcon">
            <img src="/image/burger-menu.png" alt="" width="50px">
        </div>
    </header>
    <div class="burgerMenu">
        <ul>
            <a href="/"><li>Главная</li></a>
            @foreach($menu as $value)
                <a href="{{route('category.show',$value->slug)}}"><li>{{$value->title}}</li></a>
            @endforeach
            @if(Auth::check())
                <li class="menuAuth">Привет {{Auth::user()->name}} &#9660;
                    <ul class="sublist">
                        <a href="/logout"><li>Выйти</li></a>
                    </ul>
                    </li>
                @else
                <a href="/login"><li>Войти</li></a>
                @endif


        </ul>
    </div>

    @include ('pages.slider')

    <div class="mainContainer">

    @yield('content')

    @include('pages.sidebar')

    </div>


    <footer class="footer">
        <p>Данный сайт является портфолио и не является коммерческим, все статьи взяты с других источников!</p>
        <div class="myInfo">
            <p>Мой профиль:</p>
            <a class="hh" href="#"></a>
        </div>
    </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script>
        $('.slick-slider').slick({
            variableWidth: true,
            centerMode:true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: '.prev',
            nextArrow: '.next',
        });
    </script>
</body>

</html>