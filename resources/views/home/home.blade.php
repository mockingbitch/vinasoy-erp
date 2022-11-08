@extends('homeLayout')
@section('content')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('images/banner-1.png')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2">Veyo</h1>
            <h2 class="subheading mb-4">GIỚI THIỆU
                SỮA CHUA UỐNG TỪ THỰC VẬT ĐẦU TIÊN TẠI VIỆT NAM</h2>
            {{-- <p><a href="#" class="btn btn-primary">View Details</a></p> --}}
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{asset('images/banner-2.png')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">Lên men tự nhiên</h1>
            <h2 class="subheading mb-4">Từ sữa 5 loại hạt</h2>
            {{-- <p><a href="#" class="btn btn-primary"></a></p> --}}
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-shipped"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Miễn phí ship</h3>
          <span>Cho đơn hàng trên 500k</span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-diet"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Sản phẩm tươi</h3>
          <span>Luôn luôn tươi mới</span>
        </div>
      </div>    
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-award"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Chất lượng siêu việt</h3>
          <span>Chất lượng các sản phẩm</span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-customer-service"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Hỗ trợ</h3>
          <span>Hỗ trợ 24/7</span>
        </div>
      </div>      
    </div>
  </div>
      </div>
  </section>

  <section class="ftco-section ftco-category ftco-no-pt">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-6 order-md-last align-items-stretch d-flex">
                          <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url({{asset('home/images/category.jpg')}});">
                              <div class="text text-center">
                                  <h2>Vinasoy</h2>
                                  <p>Bảo vệ sức khoẻ của mọi gia đình</p>
                                  <p><a href="{{route('home.sanpham.list')}}" class="btn btn-primary">Mua ngay</a></p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('home/images/category-1.jpg')}});">
                              <div class="text px-3 py-1">
                                  <h2 class="mb-0"><a href="#">Fruits</a></h2>
                              </div>
                          </div>
                          <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{asset('home/images/category-2.jpg')}});">
                              <div class="text px-3 py-1">
                                  <h2 class="mb-0"><a href="#">Vegetables</a></h2>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{asset('home/images/category-3.jpg')}});">
                      <div class="text px-3 py-1">
                          <h2 class="mb-0"><a href="#">Juices</a></h2>
                      </div>		
                  </div>
                  <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{asset('home/images/category-4.jpg')}});">
                      <div class="text px-3 py-1">
                          <h2 class="mb-0"><a href="#">Dried</a></h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Sản phẩm nổi bật</span>
        <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
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
                        <a href="{{route('home.sanpham.chitiet', ['id' => $sanPham->id])}}" class="img-prod"><img class="img-fluid" src="{{asset('home/images/product-1.jpg')}}" alt="Colorlib Template">
                            {{-- <span class="status">30%</span> --}}
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{route('home.sanpham.chitiet', ['id' => $sanPham->id])}}">{{$sanPham->tenSP}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        {{-- <span class="mr-2 price-dc">$120.00</span> --}}
                                        <span class="price-sale">{{number_format($sanPham->donGia)}} Đ</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a onclick="handleAddCart({{$sanPham->id}})" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
  
  <section class="ftco-section img" style="background-image: url({{asset('home/images/bg_3.jpg')}});">
  <div class="container">
          <div class="row justify-content-end">
    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
        <span class="subheading">Giá tốt cho bạn</span>
      <h2 class="mb-4">Deal of the day</h2>
      <p>Hành trình lớn đôi khi khởi nguồn từ những câu chuyện nhỏ.
        Vinasoy khởi đầu dựa trên ý niệm đó: mang tinh túy đậu nành thiên nhiên đến mọi người</p>
      <h3><a href="#">Vinasoy - mè đen</a></h3>
      <span class="price">25.000đ <a href="#">chỉ còn 23.000đ</a></span>
      <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                  </div>
    </div>
  </div>   		
  </div>
</section>
@endsection