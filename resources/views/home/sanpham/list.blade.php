@extends('homeLayout')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/banner.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p> --}}
          <h1 class="mb-0 bread">Danh sách sản phẩm</h1>
        </div>
      </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Tất cả sản phẩm</span>
        <h2 class="mb-4">Tất cả sản phẩm của chúng tôi</h2>
        <p>Hành trình lớn đôi khi khởi nguồn từ những câu chuyện nhỏ.
          Vinasoy khởi đầu dựa trên ý niệm đó: mang tinh túy đậu nành thiên nhiên đến mọi người</p>
      </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
            @foreach ($listSanPham as $sanPham)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{route('home.sanpham.chitiet', ['id' => $sanPham->id])}}" class="img-prod"><img class="img-fluid" src="{{asset('upload/images/sanpham'. {{$sanPham->img}})}}" alt="Colorlib Template">
                            {{-- <span class="status">30%</span> --}}
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$sanPham->tenSP}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    {{-- <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p> --}}
                                    <p class="price"><span class="price-sale">{{number_format($sanPham->donGia)}} Đ</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </section>
@endsection