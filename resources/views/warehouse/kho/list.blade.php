@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách xuất nhập hàng</h3>
        <a href="{{route('warehouse.nhapxuat.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>SP ID</b></th>
                <th style="text-align: center"><b>Sản phẩm</b></th>
                <th style="text-align: center"><b>Số lượng trong kho</b></th>
                <th style="text-align: center"><b>Trạng thái</b></th>
                {{-- <th><b>Xoá</b></th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($listKho as $kho)
            <tr class="tb-row" onclick="handleClickRow({{$kho->sanpham_id}})">
                <td style="text-align: center">{{$kho->sanpham_id}}</td>
                <td style="text-align: center">{{$kho->sanPham->tenSP}}</td>
                <td style="text-align: center">{{$kho->soLuong}}</td>
                <td style="text-align: center">
                    <span class="badge badge-sm {{$kho->soLuong >= 1 ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">
                        {{$kho->soLuong >= 1 ? 'Còn hàng' : 'Hết hàng'}}
                    </span>
                </td>
                {{-- <td align="left">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$sanPham->id}})">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td> --}}
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        window.location.assign('kho/chitiet?id=' + id);
    }

    function confirmDelete(id) {
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
                $.get("{{route('warehouse.kho.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('warehouse.kho.list') }} .table");
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