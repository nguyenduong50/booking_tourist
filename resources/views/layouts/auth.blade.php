<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title>Booking Tourist</title>

        <link rel="stylesheet" href="icon/themify-icons/themify-icons.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="shortcut icon" href="img/GoodTrip5.png" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}" />
        <link rel="stylesheet" href="{{asset('css/header.css')}}" />
        <link rel="stylesheet" href="{{asset('css/content.css')}}" />
        <link rel="stylesheet" href="{{asset('css/slider.css')}}" />
        <link rel="stylesheet" href="{{asset('css/booking.css')}}" />
        <link rel="stylesheet" href="{{asset('css/blog.css')}}" />
        <link rel="stylesheet" href="{{asset('css/footer.css')}}" />

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="main">
            <header id="header">
                <div class="menu_top">
                    <a href="/"><img src="img/GoodTrip5.png" alt="Logonav" /></a>
                    <ul id="nav">
                        <li><a href="/">Trang chủ</a></li>
                        <li>
                            <a href="#">Tìm kiếm</a>
                            <div class="container-1">
                                <input class="subnav timkiem" type="search" placeholder="Tìm kiếm..." />
                            </div>
                        </li>
                        <li>
                            <a href="#services">
                                Dịch vụ
                                <i class="dow-icon ti-arrow-circle-down"></i>
                            </a>
                            <ul class="subnav">
                                <li><a href="booking.html">Booking</a></li>
                                <li><a href="goidulich.html">Gói du lịch</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="hotro.html">Hỗ trợ</a></li>
                    </ul>
                </div>
            </header>

            @yield('content')

        </div>
    </body>
</html>
