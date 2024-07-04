@extends('layouts.client') @section('content')
<div id="main">
    <div id="newscontainer">
        <div class="header">
            <div class="introduct">
            <div class="container">
                <div class="content center">
                <h5 class="t-black">ĐI KHẮP VIỆT NAM</h5>
                <span class="line gold"></span>
                <h2 class="t-content">
                    CÙNG XEM QUA CÁC
                    <span class="t-gold">GÓI DU LỊCH</span>
                </h2>
                <h5 class="t-black bot-content">
                    XÁCH BALO LÊN VÀ ĐI THÔI NÀO!
                </h5>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="packages">
        <div class="box-container">
            @foreach($travel_packages as $travel_package)
            <div class="box">
                <img src="{{'img/travel_package/'.$travel_package->thumbnail}}" alt="" />
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i> {{$travel_package->name}}</h3>
                    <p>{{$travel_package->description}}</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">
                        {{number_format($travel_package->current_price, 0, ',', '.')}} VND 
                        <span> {{number_format($travel_package->original_price, 0, ',', '.')}} VND</span>
                    </div>
                    <a href="booking.html" class="btn">Đặt ngay</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
