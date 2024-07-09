@extends('layouts.client') @section('content')
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
        <form action="{{url('/booking')}}" method="POST">
            @csrf
            <div class="inputBox">
                <h3>Gói du lịch</h3>
                <input type="text" value="{{$travel_package->name}}" readonly/>
            </div>
            <div class="inputBox">
                <h3>Có bao nhiêu người cùng tham gia?</h3>
                <input type="number" placeholder="số người tham gia du lịch" name="tourists_number"/>
            </div>
            <div class="inputBox">
                <h3>Ngày bắt đầu chuyến đi?</h3>
                <input type="date" name="date_start"/>
            </div>
            <div class="inputBox">
                <h3>Số điện thoại</h3>
                <input type="text" name="phone_number" maxlength="10"/>
            </div>
            <input type="hidden" value="{{$travel_package->id}}" name="travel_package_id" readonly />
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" readonly />
            <button class="btn" type="submit">ĐẶT NGAY</button>
        </form>
    </div>
</div>
@endsection
