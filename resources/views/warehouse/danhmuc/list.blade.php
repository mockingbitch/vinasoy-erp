@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách danh mục</h3>
        <a href="{{route('warehouse.danhmuc.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>Tên danh mục</b></th>
                <th style="text-align: center"><b>Trạng thái</b></th>
                <th style="text-align: center"><b>Sửa</b></th>
                <th style="text-align: center"><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listDanhMuc as $danhMuc)
            <tr class="tb-row" onclick="handleClickRow({{$danhMuc->id}})">
                <td style="text-align: center">{{$danhMuc->tenDanhMuc}}</td>
                <td style="text-align: center">
                    <span class="badge badge-sm {{$danhMuc->trangThai == '1' ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">
                        {{$danhMuc->trangThai == '1' ? 'Hiển thị' : 'Ẩn'}}
                    </span>
                </td>
                <td align="left" style="text-align: center">
                    <a class="btn btn-success" href="{{route('warehouse.danhmuc.update', ['id' => $danhMuc->id])}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td align="left" style="text-align: center">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$danhMuc->id}})">
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
        // window.location.assign('/nhanvien/detail/' + id);
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
                $.get("{{route('warehouse.danhmuc.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('warehouse.danhmuc.list') }} .table");
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