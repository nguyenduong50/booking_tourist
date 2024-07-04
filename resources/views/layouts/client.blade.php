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
        <link rel="stylesheet" href="{{asset('css/news.css')}}" />
        <link rel="stylesheet" href="{{asset('css/booking.css')}}" />
        <link rel="stylesheet" href="{{asset('css/blog.css')}}" />
        <link rel="stylesheet" href="{{asset('css/goidulich.css')}}" />
        <link rel="stylesheet" href="{{asset('css/footer.css')}}" />

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
                                <li><a href="{{url('/travel_package')}}">Gói du lịch</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="hotro.html">Hỗ trợ</a></li>
                    </ul>

                    <!-- User -->
                    @guest
                    <div class="login-btn">
                        <a href="{{ route('login') }}">Đăng nhập</a>
                    </div>
                    @else
                        <div class="user-section">
                            <i class="fas fa-user"></i>
                            <span>{{ Auth::user()->name }}</span>
                            <div class="user-section-dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>

            </header>

            @yield('content')

            <div id="footer">
                <div class="footer-top">
                    <div class="contact-container center">
                        <div class="contact-top">
                            <div class="introduct">
                                <div class="container">
                                    <div class="content center">
                                        <h5 class="t-black">ĐI KHẮP VIỆT NAM</h5>
                                        <span class="line gold"></span>
                                        <h2 class="t-content">
                                            ĐỪNG QUÊN RẰNG CÒN CÓ
                                            <span class="t-gold">GOODTRIP</span>
                                        </h2>
                                        <h5 class="t-black bot-content">
                                            HÃY GIỮ LIÊN LẠC VỚI GOODTRIP
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="container-email">
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Để lại Email của bạn*" required="required" />
                                <input type="submit" name="submit" id="submit" value="Gửi" />
                            </div>
                        </div>
                        <div class="contact-bot">
                            <h5 class="t-black">GIỮ LIÊN LẠC VỚI CHÚNG TÔI</h5>
                            <span class="line gold"></span>
                            <div class="mxh">
                                <a href="" class="primary-btn"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                                <a href="" class="primary-btn"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="" class="primary-btn"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="footer-end">
                            2024 - Trang web được thiết kế bởi Công ty du lịch ABC
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
