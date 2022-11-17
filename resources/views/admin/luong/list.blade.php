@extends('dashboardLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Bảng lương</h3>
        <a href="{{route('admin.phongban.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>Tên nhân viên</b></th>
                <th style="text-align: center"><b>Tháng</b></th>
                <th style="text-align: center"><b>Tiền lương</b></th>
                <th style="text-align: center"><b>Trạng thái</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listLuong as $luong)
            <tr class="tb-row" onclick="handleClickRow({{$luong->id}})">
                <td style="text-align: center">{{$luong->nhanvien->hoTen}}</td>
                <td style="text-align: center">{{$luong->thang}}</td>
                <td style="text-align: center">{{$luong->tienLuong}}</td>
                <td style="text-align: center">{{$luong->trangThai == '1' ? 'Đã quyết toán' : 'Chưa quyết toán'}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        console.log(id);
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
                $.get("{{route('admin.phongban.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('admin.phongban.list') }} .table");
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