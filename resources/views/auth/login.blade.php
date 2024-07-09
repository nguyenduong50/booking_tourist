@extends('layouts.auth') 
@section('content')
<link rel="stylesheet" href="{{asset('frontend/client/css/login.css')}}" />
<div id="login">
    <div class="login-banner">
        <div class="uilogin">
            <div class="login-top">
                <img src="img/GoodTrip5.png" alt="Logonav" />
                <h1>ĐĂNG NHẬP VÀO <span style="color: #06aa2a;">GOODTRIP</span></h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-mid">
                    @if($errors->any())
                        <div style="color: red; font-size: 15px">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach    
                        </div>
                    @endif
                    <input type="email" placeholder="Enter Email" name="email" minlength="11" autocomplete="off"/>                  
                    <input type="password"  placeholder="Mật khẩu" name="password" minlength="6" />
                    <div class="sub-login-mid">
                        <p><a href="{{route('register')}}">Đăng kí</a></p>
                        <p><a href="">Quên mật khẩu?</a></p>
                    </div>
                </div>
                <div class="login-bot">
                    <button type="submit">Đăng nhập</button>
                </div>
            </form>
            <div class="another-login">
                <div class="mxh">
                    <a href="" class="primary-btn"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="" class="primary-btn"><i class="fab fa-google"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection