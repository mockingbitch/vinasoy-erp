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
                <th style="text-align: center"><b>Nhà cung cấp</b></th>
                <th style="text-align: center"><b>Nhân viên phụ trách</b></th>
                <th style="text-align: center"><b>Kiểu</b></th>
                <th style="text-align: center"><b>Tổng</b></th>
                <th style="text-align: center"><b>Ngày</b></th>
                {{-- <th><b>Xoá</b></th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($listNhapXuat as $nhapXuat)
            <tr class="tb-row" onclick="handleClickRow({{$nhapXuat->id}})">
                <td style="text-align: center">{{$nhapXuat->nhaCungCap->tenNhaCC}}</td>
                <td style="text-align: center">{{$nhapXuat->user_id}}</td>
                <td style="text-align: center">
                    <span class="badge badge-sm {{$nhapXuat->type == 'NHAP' ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">
                        {{$nhapXuat->type == 'NHAP' ? 'Nhập' : 'Xuất'}}
                    </span>
                </td>
                <td style="text-align: center">{{number_format($nhapXuat->tong)}}</td>
                <td style="text-align: center">{{$nhapXuat->created_at}}</td>
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
        window.location.assign('nhapxuat/chitiet?id=' + id);
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
                $.get("{{route('warehouse.nhapxuat.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('warehouse.nhapxuat.list') }} .table");
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