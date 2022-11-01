@extends('dashboardLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách nhân viên</h3>
        <a href="{{route('admin.nhanvien.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>ID</b></th>
                <th style="text-align: center"><b>Họ tên</b></th>
                <th style="text-align: center"><b>Giới tính</b></th>
                <th style="text-align: center"><b>Ngày sinh</b></th>
                <th style="text-align: center"><b>Chức vụ</b></th>
                <th style="text-align: center"><b>Mã phòng</b></th>
                <th style="text-align: center"><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listNhanVien as $nhanVien)
            <tr class="tb-row" onclick="handleClickRow({{$nhanVien->id}})">
                <td style="text-align: center">{{$nhanVien->id}}</td>
                <td style="text-align: center">{{$nhanVien->hoTen}}</td>
                <td style="text-align: center">
                    @if ($nhanVien->gioiTinh == 0)
                        Nam
                    @elseif ($nhanVien->gioiTinh == 1)
                        Nữ
                    @else
                        Khác
                    @endif
                </td>
                <td style="text-align: center">{{$nhanVien->ngaySinh}}</td>
                <td style="text-align: center">{{$nhanVien->phongBan->tenPhong}}</td>
                <td style="text-align: center">{{$nhanVien->chucVu->tenChucVu}}</td>
                <td align="left" style="text-align: center">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$nhanVien->id}})">
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
        window.location.assign('nhanvien/' + id);
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
                $.get("{{route('admin.nhanvien.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('admin.nhanvien.list') }} .table");
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