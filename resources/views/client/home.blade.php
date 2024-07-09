@extends('layouts.client')
@section('content')
<div id="slider">
    <div class="banner-section">
        <video playsinline autoplay muted loop>
            z
            <source src="img/introbanner.mp4" />
        </video>
        <div class="text-slider">
            <h2 class="heading-slider">Hãy cùng nhau đi khắp việt nam</h2>
            <h4>
                Muốn đi nhanh hãy đi một mình | muốn đi xa hãy đi cùng GoodTrip
            </h4>
            <a class="morebanner-btn" href="#4diemden">Trải nghiệm</a>
        </div>
    </div>
</div>

<!-- Destination Travel -->
<div id="content">
    <div class="introduct">
        <div class="container">
            <div class="content center">
                <h5 class="t-black">ĐI KHẮP VIỆT NAM</h5>
                <span class="line gold"></span>
                <h2 class="t-content">
                    HÃY CÙNG NHAU ĐI
                    <span class="t-gold">DU LỊCH</span>
                </h2>
                <div id="4diemden"></div>
                <h5 class="t-black bot-content">CHỌN CHO MÌNH MỘT ĐIỂM ĐẾN</h5>
            </div>
        </div>
    </div>

    <div class="layout-content">
        @foreach($posts as $post)
        <div class="box-container">
            <div class="box">
                <img src="{{'img/post/'.$post->thumbnail}}" alt="img-left" />
                <div class="content">
                    <h3>{{$post->destination}}</h3>
                    <p>
                        {{$post->title}}
                    </p>
                    <a href="Sapa.html" class="btn">ĐẾN ĐÓ</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Feature Articles -->
<div id="blog" style="margin-top: 300px">
    <!-- hEADER OF BLOG -->
    <div class="header">
        <div class="introduct">
            <div class="container">
                <div class="content center">
                    <h5 class="t-black">ĐI KHẮP VIỆT NAM</h5>
                    <span class="line gold"></span>
                    <h2 class="t-content">
                        NƠI ĐÂY SẼ CẬP NHẬT
                        <span class="t-gold">BLOG</span>
                        MỖI NGÀY
                    </h2>
                    <h5 class="t-black bot-content">
                        ĐÓN CHỜ CÁC TIN TỨC TỪ NHỮNG ĐỊA ĐIỂM DU LỊCH
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-blog center">
        <div class="container-header">
            <a href="blog.html" class="btn-more">Xem tất cả >></a>
        </div>
        <div class="container-news">
            @foreach($feature_posts as $feature_post)
            <div class="product-blog">
                <a href=""><img src="{{'img/post/'.$feature_post->thumbnail}}" alt="" class="blog-img" /></a>
                <div class="blog-content">
                    <a href="">
                        <h4 class="">
                            {{$feature_post->title}}
                        </h4>
                    </a>
                    <div class="blog-detail">
                        <div class="info">By: {{$feature_post->User->name}}</div>
                        <div class="info2">
                            <div class="date"><i class="fas fa-clock"></i>{{($feature_post->updated_at)->format('d-m-Y') }}</div>
                            <div class="view"><i class="fas fa-eye"></i>999 view</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
