@extends('dashboardLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách chức vụ</h3>
        <a href="{{route('admin.chucvu.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><b>ID</b></th>
                <th><b>Tên chức vụ</b></th>
                <th><b>Ghi chú</b></th>
                <th><b>Trạng thái</b></th>
                <th><b>Sửa</b></th>
                <th><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listChucVu as $chucVu)
            <tr class="tb-row" onclick="handleClickRow({{$chucVu->id}})">
                <td>{{$chucVu->id}}</td>
                <td>{{$chucVu->tenChucVu}}</td>
                <td>{{$chucVu->ghiChu}}</td>
                <td>{{$chucVu->trangThai == '1' ? 'Hiển thị' : 'Ẩn'}}</td>
                <td align="left">
                    <a class="btn btn-success" href="{{route('admin.chucvu.update', ['id' => $chucVu->id])}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td align="left">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$chucVu->id}})">
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
                $.get("{{route('admin.chucvu.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('admin.chucvu.list') }} .table");
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