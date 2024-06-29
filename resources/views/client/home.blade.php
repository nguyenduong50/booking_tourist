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
        <div class="box-container">
            <div class="box">
                <img src="img/TayBacBaner.png" alt="img-left" />
                <div class="content">
                    <h3>SAPA</h3>
                    <p>
                        Sapa là “nơi gặp gỡ giữa trời và đất” cảnh sắc thiên nhiên hùng vĩ bậc nhất miền Bắc
                    </p>
                    <a href="Sapa.html" class="btn">ĐẾN ĐÓ</a>
                </div>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="img/DaLatbanner.jpg" alt="img-left" />
                <div class="content">
                    <h3>ĐÀ LẠT</h3>
                    <p>
                        Đà lạt nổi tiếng với các đồi thông và "lời nguyền chia tay" của các cặp đôi!
                    </p>
                    <a href="Dalat.html" class="btn">ĐẾN ĐÓ</a>
                </div>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="img/DaNang.png" alt="img-left" />
                <div class="content">
                    <h3>VŨNG TÀU</h3>
                    <p>
                        Vũng Tàu từ lâu đã nổi tiếng với những bãi tắm đẹp và vô vàng những món ăn ngon.
                    </p>
                    <a href="vungtau.html" class="btn">ĐẾN ĐÓ!</a>
                </div>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="img/MienTayBanner.png" alt="img-left" />
                <div class="content">
                    <h3>CẦN THƠ</h3>
                    <p>
                        Cần Thơ được gọi là xứ Tây Đô. Nổi tiếng với cảnh sắc phong phú và trong lành.
                    </p>
                    <a href="cantho.html" class="btn">ĐẾN ĐÓ!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking -->
<div id="booking">
    <div class="introduct">
        <div class="container">
            <div class="content center">
                <h5 class="t-black">ĐI KHẮP VIỆT NAM</h5>
                <span class="line gold"></span>
                <h2 class="t-content">
                    BẠN ĐÃ QUYẾT ĐỊNH
                    <span class="t-gold">ĐẶT VÉ</span>
                    CHƯA?
                </h2>
                <h5 class="t-black bot-content">
                    HÃY ĐIỀN THÔNG TIN ĐỂ CHÚNG TÔI CÓ THỂ HỖ TRỢ
                </h5>
            </div>
        </div>
    </div>
    <div class="container-booking">
        <img src="img/bookimg.png" alt="" />
        <form action="">
            <div class="inputBox">
                <h3>Bạn muốn đi đâu?</h3>
                <input type="text" placeholder="chọn một địa điểm" />
            </div>
            <div class="inputBox">
                <h3>Có bao nhiêu người cùng tham gia?</h3>
                <input type="number" placeholder="số người tham gia du lịch" />
            </div>
            <div class="inputBox">
                <h3>Ngày bắt đầu chuyến đi?</h3>
                <input type="date" />
            </div>
            <div class="inputBox">
                <h3>Ngày kết thúc chuyến đi?</h3>
                <input type="date" />
            </div>
            <input type="button" onclick="alert('Trang web đang trong quá trình được phát triển!')" class="btn" value="Đặt ngay" />
        </form>
    </div>
</div>

<div id="blog">
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
    <!-- END HEADER OF BLOG -->
    <div class="container-blog center">
        <div class="container-header">
            <a href="blog.html" class="btn-more">Xem tất cả >></a>
        </div>
        <div class="container-news">
            <div class="product-blog">
                <a href=""><img src="img/kinh-nghiem-du-lich-sapa-cung-gia-dinh.jpg" alt="" class="blog-img" /></a>
                <div class="blog-content">
                    <a href="">
                        <h4 class="">
                            Kinh nghiệm du lịch sapa 3 ngày 2 đêm từ A - Z
                        </h4>
                    </a>
                    <div class="blog-detail">
                        <div class="info">By: Nguyen Duong</div>
                        <div class="info2">
                            <div class="date"><i class="fas fa-clock"></i>20/1/2022</div>
                            <div class="view"><i class="fas fa-eye"></i>999 view</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-blog">
                <a href=""><img src="img/da-lat-mua-xuan.jpg" alt="" class="blog-img" /></a>
                <div class="blog-content">
                    <a href="">
                        <h4 class="">
                            Thời điểm thích hợp nhất để đi Đà Lạt là mùa xuân
                        </h4>
                    </a>
                    <div class="blog-detail">
                        <div class="info">By: Nguyen Duong</div>
                        <div class="info2">
                            <div class="date"><i class="fas fa-clock"></i>20/1/2022</div>
                            <div class="view"><i class="fas fa-eye"></i>999 view</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-blog">
                <a href=""><img src="img/CamnangdulichVungTau.jpg" alt="" class="blog-img" /></a>
                <div class="blog-content">
                    <a href="">
                        <h4 class="">
                            Cất túi ngay cuốn cẩm nang du lịch Vũng Tàu 2022
                        </h4>
                    </a>
                    <div class="blog-detail">
                        <div class="info">By: Nguyen Duong</div>
                        <div class="info2">
                            <div class="date"><i class="fas fa-clock"></i>20/1/2022</div>
                            <div class="view"><i class="fas fa-eye"></i>999 view</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
