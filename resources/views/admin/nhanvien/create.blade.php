@extends('dashboardLayout')
@section('content')
<h2>Quản lý nhân viên</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
     <div class="form-group mt-4">
        <label for="inputHoTen">Họ và tên @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
        <input type="text" name="hoTen" class="form-control" id="inputHoTen" aria-describedby="nameHelp" value="">
    </div>
    <div class="form-group">
        <label for="inputGioiTinh">Giới tính @if ($errors->has('gioiTinh'))<p class="text-error">*{{$errors->first('gioiTinh')}}</p>@endif</label>
        <br>
        <input type="radio" id="nam" name="gioiTinh" value="0">
        <label for="nam">Nam</label><br>
        <input type="radio" id="nu" name="gioiTinh" value="1">
        <label for="nu">Nữ</label><br>
        <input type="radio" id="khac" name="gioiTinh" value="2">
        <label for="khac">Khác</label>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="inputNgaySinh">Ngày sinh @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="date" class="form-control" name="ngaySinh" id="inputNgaySinh" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputThuongTru">Thường trú @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="thuongTru" id="inputThuongTru" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputTamTru">Tạm trú @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="tamTru" id="inputTamTru" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputCCCD">Căn cước công dân @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="cccd" id="inputCCCD" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputHocVan">Học vấn @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="hocVan" id="inputHocVan" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNgoaiNgu">Ngoại ngữ @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="ngoaiNgu" id="inputNgoaiNgu" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputChucVu">Chức vụ @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="chucvu_id" id="inputChucVu" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputPhongBan">Phòng ban @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="maphong_id" id="inputPhongBan" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNganHang">Ngân hàng @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="nganHang" id="inputNganHang" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputSTK">Số tài khoản @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
                <input type="text" class="form-control" name="stk" id="inputSTK" value="">
            </div>
        </div>
    </div>

    <a href="{{route('admin.nhanvien.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
