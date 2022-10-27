@extends('dashboardLayout')
@section('content')
<h2>Tạo mới nhân viên</h2>{{$msg ?? ''}}
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
                <label for="inputNgaySinh">Ngày sinh @if ($errors->has('ngaySinh'))<p class="text-error">*{{$errors->first('ngaySinh')}}</p>@endif</label>
                <input type="date" class="form-control" name="ngaySinh" id="inputNgaySinh" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputThuongTru">Thường trú @if ($errors->has('thuongTru'))<p class="text-error">*{{$errors->first('thuongTru')}}</p>@endif</label>
                <input type="text" class="form-control" name="thuongTru" id="inputThuongTru" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputTamTru">Tạm trú @if ($errors->has('tamTru'))<p class="text-error">*{{$errors->first('tamTru')}}</p>@endif</label>
                <input type="text" class="form-control" name="tamTru" id="inputTamTru" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputCCCD">Căn cước công dân @if ($errors->has('cccd'))<p class="text-error">*{{$errors->first('cccd')}}</p>@endif</label>
                <input type="text" class="form-control" name="cccd" id="inputCCCD" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputHocVan">Học vấn @if ($errors->has('hocVan'))<p class="text-error">*{{$errors->first('hocVan')}}</p>@endif</label>
                <input type="text" class="form-control" name="hocVan" id="inputHocVan" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNgoaiNgu">Ngoại ngữ @if ($errors->has('ngoaiNgu'))<p class="text-error">*{{$errors->first('ngoaiNgu')}}</p>@endif</label>
                <input type="text" class="form-control" name="ngoaiNgu" id="inputNgoaiNgu" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-4">
                <label for="inputPhongBan">Phòng ban @if ($errors->has('maphong_id'))<p class="text-error">*{{$errors->first('maphong_id')}}</p>@endif</label>
                <select name="maphong_id" style="width: 20%; height: 50px; margin-left: 17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listPhongBan as $phongBan)
                    <option value="{{$phongBan->id}}">{{$phongBan->tenPhong}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-4">
                <label for="inputChucVu">Chức vụ @if ($errors->has('chucvu_id'))<p class="text-error">*{{$errors->first('chucvu_id')}}</p>@endif</label>
                <select name="chucvu_id" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listChucVu as $chucVu)
                    <option value="{{$chucVu->id}}">{{$chucVu->tenChucVu}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNganHang">Ngân hàng @if ($errors->has('nganHang'))<p class="text-error">*{{$errors->first('nganHang')}}</p>@endif</label>
                <input type="text" class="form-control" name="nganHang" id="inputNganHang" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputSTK">Số tài khoản @if ($errors->has('stk'))<p class="text-error">*{{$errors->first('stk')}}</p>@endif</label>
                <input type="text" class="form-control" name="stk" id="inputSTK" value="">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="inputEmail">Email @if ($errors->has('email'))<p class="text-error">*{{$errors->first('email')}}</p>@endif</label>
                <input type="text" class="form-control" name="email" id="inputEmail" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputPassword">Mật khẩu @if ($errors->has('password'))<p class="text-error">*{{$errors->first('password')}}</p>@endif</label>
                <input type="password" class="form-control" name="password" id="inputPassword" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputRePassword">Xác nhận mật khẩu @if ($errors->has('re-password'))<p class="text-error">*{{$errors->first('re-password')}}</p>@endif</label>
                <input type="password" class="form-control" name="re-password" id="inputRePassword" value="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-4">
                <label for="inputRole">Vai trò @if ($errors->has('role'))<p class="text-error">*{{$errors->first('role')}}</p>@endif</label>
                <select name="role" style="width:20%; height:50px; margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="0">Admin</option>
                    <option value="1">Manager</option>
                    <option value="2">Staff</option>
                    <option value="3">User</option>
                </select>
            </div>
        </div>
    </div>

    <a href="{{route('admin.nhanvien.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
