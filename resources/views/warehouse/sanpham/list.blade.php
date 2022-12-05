@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách sản phẩm</h3>
        <a href="{{route('warehouse.sanpham.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>Mã sp</b></th>
                <th><b>Tên sản phẩm</b></th>
                <th style="text-align: center"><b>Danh mục</b></th>
                <th style="text-align: center"><b>Nhà cung cấp</b></th>
                <th style="text-align: center"><b>Đơn giá</b></th>
                <th style="text-align: center"><b>Hình ảnh</b></th>
                <th style="text-align: center"><b>Trạng thái</b></th>
                <th><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listSanPham as $sanPham)
            <tr class="tb-row" onclick="handleClickRow({{$sanPham->id}})">
                <td style="text-align: center">{{$sanPham->id}}</td>
                <td>{{$sanPham->tenSP}}</td>
                <td style="text-align: center">{{$sanPham->danhmuc->tenDanhMuc}}</td>
                <td style="text-align: center">{{$sanPham->nhacungcap->tenNhaCC}}</td>
                <td style="text-align: center">{{number_format($sanPham->donGia)}}</td>
                <td style="text-align: center"><img width="100px" src="{{asset('upload/images/sanpham/' . $sanPham->img)}}" alt=""></td>
                <td style="text-align: center">{{$sanPham->trangThai == '1' ? 'Hiển thị' : 'Ẩn'}}</td>
                <td align="left">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$sanPham->id}})">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        window.location.assign('sanpham/' + id);
    }

    function confirmDelete(id, e) {
        swal({
            title: "Bạn có muốn xoá mục này?",
            text: "Dữ liệu xoá sẽ không thể khôi phục!",
            icon: "warning",
            buttons: [
                'Huỷ',
                'Xoá'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $.get("{{route('warehouse.sanpham.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('warehouse.sanpham.list') }} .table");
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