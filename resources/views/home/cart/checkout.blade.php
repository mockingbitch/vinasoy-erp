@extends('homeLayout')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/banner.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
          <form method="post" class="billing-form">
            <h3 class="mb-4 billing-heading">Chi tiết hoá đơn</h3>
            <div class="row align-items-end">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="firstname">Họ Tên</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="streetaddress">Địa chỉ</label>
                  <input type="text" name="address" class="form-control" placeholder="Ghi rõ số nhà, toà nhà">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" name="sdt" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="emailaddress">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="">
                </div>
              </div>
            </div>
            </form><!-- END -->
        </div>
        <div class="col-xl-5">
          <div class="row mt-5 pt-3">
            <div class="col-md-12 d-flex mb-5">
              <div class="cart-detail cart-total p-3 p-md-4">
                <h3 class="billing-heading mb-4">Giỏ hàng</h3>
                <p class="d-flex">
                <span>Tổng tiền</span>
                <span>{{number_format($subTotal)}} Đ</span>
                </p>
                <p class="d-flex">
                  <span>Phí vận chuyển</span>
                  <span>0.00</span>
                </p>
                <p class="d-flex">
                  <span>Khuyến mãi</span>
                  <span>0.00</span>
                </p>
                <hr>
                <p class="d-flex total-price">
                    <span>Thành tiền</span>
                    <span>{{number_format($subTotal)}} Đ</span>
                </p>
              </div>
            </div>
            <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4">
                  <p><a href="{{route('home.confirm-order')}}"class="btn btn-primary py-3 px-4">Xác nhận</a></p>
                </div>
            </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section>
@endsection