@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Chi tiết nhập xuất</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>Tên sản phẩm</b></th>
                <th style="text-align: center"><b>Số lượng</b></th>
                <th style="text-align: center"><b>Đơn giá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listChiTiet as $chiTiet)
            @php $total = $chiTiet->nhapXuat->tong @endphp
            <tr class="tb-row">
                <td style="text-align: center">{{$chiTiet->sanPham->tenSP}}</td>
                <td style="text-align: center">{{$chiTiet->soLuong}}</td>
                <td style="text-align: center">{{number_format($chiTiet->donGia)}}</td>
            </tr>
            @endforeach
            <tr class="tb-row">
                <td style="text-align: center"></td>
                <td style="text-align: center"></td>
                <td style="text-align: center">{{number_format($total)}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        // window.location.assign('/nhanvien/detail/' + id);
    }

    $(document).ready(function() {
        var errCode = $('.err-code').val();console.log(errCode);
        if (errCode && errCode == 'created') {
            swal({
                title: "Thêm mới!",
                text: "Thêm mới thành công!",
                icon: "success",
                button: "Đóng!",
                });
        }
                                         if (errCode && errCode == 'updated') {
            swal({
                title: "Cập nhật!",
                text: "Cập nhật thành công!",
                icon: "success",
                button: "Đóng!",
                });
        }
    });
</script>
@endsection