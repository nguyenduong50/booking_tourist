@extends('layouts.auth')
@section('content')
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
<div id="login">
    <div class="login-banner">
        <div class="uilogin">
            <div class="login-top">
                <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="login-mid">
                    @if($errors->any())
                        <div style="color: red; font-size: 15px">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach    
                        </div>
                    @endif
                    <input type="email" placeholder="Nhập email" name="email" minlength="11" autocomplete="off" />      
                    <input type="text" placeholder="Nhập tên người dùng" name="name" minlength="5" autocomplete="off" />             
                    <input type="password"  placeholder="Mật khẩu" name="password" minlength="8" />
                    <input type="password"  placeholder="Nhập lại mật khẩu" name="password_confirmation" minlength="8" />
                </div>
                <div class="login-bot">
                    <button type="submit">Đăng ký</button>
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
