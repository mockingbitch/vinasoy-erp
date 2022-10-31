@extends('dashboardLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách thưởng phạt</h3>
        <a href="{{route('admin.klkt.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><b>Tên nhân viên</b></th>
                <th><b>Hình thức</b></th>
                <th><b>Lý do</b></th>
                <th><b>Mức phạt</b></th>
                <th><b>Mức thưởng</b></th>
                <th style="{{$user->role == 'ADMIN' || $user->role == 'MANAGER' ? 'block' : 'none'}}"><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listKLKT as $klkt)
            <tr class="tb-row" onclick="handleClickRow({{$klkt->id}})">
                <td>{{$klkt->nhanVien->hoTen ?? ''}}</td>
                <td>{{$klkt->hinhThuc}}</td>
                <td>{{$klkt->lyDo}}</td>
                <td>{{$klkt->mucPhat}}</td>
                <td>{{$klkt->mucThuong}}</td>
                <td align="left" style="{{$user->role == 'ADMIN' || $user->role == 'MANAGER' ? 'block' : 'none'}}">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$klkt->id}})">
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