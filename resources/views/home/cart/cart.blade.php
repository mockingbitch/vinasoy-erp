@extends('homeLayout')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/banner.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p> --}}
                <h1 class="mb-0 bread">Giỏ hàng</h1>
            </div>
        </div>
    </div>
</div>
@if (null != $listGioHang && ! empty($listGioHang))
<section class="ftco-section ftco-cart">
    <div class="container" id="view-cart">
        <div class="row">
        <div class="col-md-12 ftco-animate">
            <div class="cart-list">
                    <table class="table view-cart-change">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subTotal = 0; @endphp
                            @foreach($listGioHang as $gioHang)
                                <tr class="text-center">
                                    <td class="product-remove"><a onclick="handleRemoveItemCart({{$gioHang['id']}})"><span class="ion-ios-close"></span></a></td>
                                    <td class="image-prod"><div class="img" style="background-image:url({{asset('images/spsmall.png')}});"></div></td>
                                    <td class="product-name">
                                        <h3>{{$gioHang['ten']}}</h3>
                                    </td>
                                    <td class="price">{{number_format($gioHang['gia'])}} Đ</td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" name="quantity" onchange="handleUpdateItemCart({{$gioHang['id']}})" class="quantity_{{$gioHang['id']}} form-control input-number" value="{{$gioHang['soLuong']}}" min="1" max="100">
                                        </div>
                                    </td>
                                    <td class="total">{{number_format($total = $gioHang['gia'] * $gioHang['soLuong'])}}</td>
                                </tr>
                                @php $subTotal += $total; @endphp
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="cart-total mb-3">
            <h3>Tổng tiền</h3>
            <p class="d-flex">
                <span>Tổng</span>
                <span>{{number_format($subTotal)}} VND</span>
            </p>
            <p class="d-flex">
                <span>Khuyến mãi</span>
                <span>0.00</span>
            </p>
            <hr>
            <p class="d-flex total-price">
                <span>Thành tiền</span>
                <span>{{number_format($subTotal)}} VND</span>
            </p>
            <p>
                <a href="{{route('home.cart.checkout')}}" class="btn btn-primary py-3 px-4">Đặt hàng</a>
            </p>
        </div>
    </div>
</section>
@else
    <h2 class="text-empty">Giỏ hàng trống</h2>
@endif
<script>
    function handleUpdateItemCart(id) {
        let soluong = $('.quantity_'+id).val();

        if (soluong > 0) {
            $.get('{{route('update-cart')}}', {"id": id, "soluong": soluong}, function (data) {
                $(".table").load("{{ route('home.cart.list') }} .table");
                $(".justify-content-end").load("{{ route('home.cart.list') }} .cart-total");
            });
        }
    }

    function handleRemoveItemCart(id) {
        swal({
            title: "Bạn có muốn sản phẩm này?",
            text: "Dữ liệu xoá sẽ không thể khôi phục!",
            icon: "warning",
            buttons: [
                'Huỷ',
                'Xoá'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $.get('{{route('remove-cart')}}', {"id": id}, function (data) {
                    $(".table").load("{{ route('home.cart.list') }} .table");
                    $(".justify-content-end").load("{{ route('home.cart.list') }} .cart-total");
                });

                swal({
                title: 'Đã xoá!',
                text: 'Xoá thành công mục này!',
                icon: 'success'
                }).then(function() {
                });
            } else {
                swal("Huỷ", "Dữ liệu của bạn vẫn an toàn :)", "error");
            }
        })
    }
</script>
@endsection