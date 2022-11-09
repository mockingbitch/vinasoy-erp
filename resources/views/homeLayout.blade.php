<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vinasoy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="{{asset('home/css/google-font1.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/google-font2.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/google-font3.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('home/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('home/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('home/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('home/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('home/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}">
    <script src="{{asset('dashboard/assets/js/jquery.js')}}"crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('dashboard/assets/js/swal.js')}}"></script>
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"  style="display: {{null != Auth::guard('user')->user() ? 'block' : 'none'}} !important"></span></div>
						    <span class="text"  style="display: {{null != Auth::guard('user')->user() ? 'block' : 'none'}} !important">{{Auth::guard('user')->user()->email ?? ''}}</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text"  style="display: {{null != Auth::guard('user')->user() ? 'block' : 'none'}} !important" onclick="handleLogOut()">Đăng xuất</span>
						    <span class="text"  style="display: {{null == Auth::guard('user')->user() ? 'block' : 'none'}} !important" onclick="handleLogin()">Đăng nhập</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}">Vinasoy</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Bài viết</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{route('home.cart.list')}}" class="nav-link cart-item"><span class="icon-shopping_cart"></span>[{{null !== session()->get('cart') ? count(session()->get('cart')) : 0}}]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    {{-- section content  --}}
      @yield('content')
    <hr>
	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Đăng ký để nhận thông tin mới</h2>
          	<span>Nhận thông tin từ các chương trình khuyến mãi qua mail</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Nhập email của bạn">
                <input type="submit" value="Đăng ký" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vinasoy</h2>
              <p></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cửa hàng</a></li>
                <li><a href="#" class="py-2 d-block">Về chúng tôi</a></li>
                <li><a href="#" class="py-2 d-block">Hành trình</a></li>
                <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Trợ giúp</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Thông tin giao hàng</a></li>
	                <li><a href="#" class="py-2 d-block">Hoàn trả</a></li>
	                <li><a href="#" class="py-2 d-block">Điều lệ</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Thắc mắc liên hệ?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Số 2, Nguyễn Chí Thanh
                        Tp. Quảng Ngãi, tỉnh Quảng Ngãi
                        Việt Nam</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(055) 3 719 719</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@vinasoy.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Vinasoy</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('home/js/jquery.min.js')}}"></script>
  <script src="{{asset('home/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('home/js/popper.min.js')}}"></script>
  <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('home/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('home/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('home/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('home/js/aos.js')}}"></script>
  <script src="{{asset('home/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('home/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('home/js/scrollax.min.js')}}"></script>
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
  <script src="{{asset('home/js/google-map.js')}}"></script>
  <script src="{{asset('home/js/main.js')}}"></script>
  <script>
    function handleAddCart(id) {
      $.get('{{route('add-cart')}}', {"id": id}, function (data) {
        if (data === 'true') {
          $(".cta-colored").load("{{route('home')}} .cta-colored");
          swal("Thêm giỏ hàng", "Đã thêm vào giỏ hàng!", "success");
        } else {
          swal("Thất bại", "Thêm thẩt bại!", "warning");
        }
      });
    }

    function handleLogOut() {
      window.location.href = '{{route('logout')}}';
    }

    function handleLogin () {
      window.location.href = '{{route('login')}}';
    }
  </script>
  </body>
</html>