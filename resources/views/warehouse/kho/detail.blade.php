@extends('warehouseLayout')
@section('content')
<input type="hidden" class="err-code" value="{{$errCode ?? ''}}"/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Chi tiết sản phẩm: {{$listChiTiet[0]->sanPham->tenSP}}</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center"><b>Ngày nhập</b></th>
                <th style="text-align: center"><b>Số lượng</b></th>
                <th style="text-align: center"><b>Ngày sản xuất</b></th>
                <th style="text-align: center"><b>Hạn sử dụng</b></th>
                <th style="text-align: center"><b>Đơn giá</b></th>
                <th style="text-align: center"><b>Số lượng</b></th>
                <th style="text-align: center"><b>Trạng thái</b></th>
                {{-- <th><b>Xoá</b></th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($listChiTiet as $chiTiet)
            <tr class="tb-row" >
                <td style="text-align: center">{{$chiTiet->created_at}}</td>
                <td style="text-align: center">{{$chiTiet->soLuong}}</td>
                <td style="text-align: center">{{$chiTiet->nsx}}</td>
                <td style="text-align: center">{{$chiTiet->hsd}}</td>
                <td style="text-align: center">{{number_format($chiTiet->donGia)}}</td>
                <td style="text-align: center">{{$chiTiet->soLuong >= 1 ? 'Còn hàng' : 'Hết hàng'}}</td>
                <td style="text-align: center">{{$chiTiet->trangThai}}</td>

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
        // window.location.assign('nhapxuat/chitiet?id=' + id);
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