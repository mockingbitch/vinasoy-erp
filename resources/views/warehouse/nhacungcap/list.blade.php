@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách nhà cung cấp</h3>
        <a href="{{route('warehouse.nhacungcap.create')}}">
            <button class="btn btn-primary" style="float: right;">Thêm mới</button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th><b>Tên nhà cung cấp</b></th>
                <th><b>Mã số thuế</b></th>
                <th><b>Số điện thoại</b></th>
                <th><b>Email</b></th>
                <th><b>FAX</b></th>
                <th><b>Website</b></th>
                <th><b>Địa chỉ</b></th>
                <th><b>Trạng thái</b></th>
                <th><b>Sửa</b></th>
                <th><b>Xoá</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($listNhaCC as $nhacc)
            <tr class="tb-row" onclick="handleClickRow({{$nhacc->id}})">
                <td>{{$nhacc->tenNhaCC}}</td>
                <td>{{$nhacc->maSoThue}}</td>
                <td>{{$nhacc->sdt}}</td>
                <td>{{$nhacc->email}}</td>
                <td>{{$nhacc->fax}}</td>
                <td>{{$nhacc->website}}</td>
                <td>{{$nhacc->diaChi}}</td>
                <td style="text-align: center">
                    <span class="badge badge-sm {{$nhacc->trangThai == '1' ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">
                        {{$nhacc->trangThai == '1' ? 'Hiển thị' : 'Ẩn'}}
                    </span>
                </td>
                <td align="left">
                    <a class="btn btn-success" href="{{route('warehouse.nhacungcap.update', ['id' => $nhacc->id])}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td align="left">
                    <a class="btn btn-danger"
                        onclick="confirmDelete({{$nhacc->id}})">
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
                $.get("{{route('warehouse.nhacungcap.delete')}}", {"id": id}, function(data) {
                     $(".table").load("{{ route('warehouse.nhacungcap.list') }} .table");
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