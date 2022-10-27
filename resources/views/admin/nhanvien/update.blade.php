@extends('dashboardLayout')
@section('content')
<h2>Sửa đổi thông tin nhân viên</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
     <div class="form-group mt-4">
        <label for="inputHoTen">Họ và tên @if ($errors->has('hoTen'))<p class="text-error">*{{$errors->first('hoTen')}}</p>@endif</label>
        <input type="text" name="hoTen" class="form-control" id="inputHoTen" aria-describedby="nameHelp" value="{{$nhanVien->hoTen ?? ''}}">
    </div>
    <div class="form-group">
        <label for="inputGioiTinh">Giới tính @if ($errors->has('gioiTinh'))<p class="text-error">*{{$errors->first('gioiTinh')}}</p>@endif</label>
        <br>
        <input type="radio" id="nam" name="gioiTinh" value="0" {{$nhanVien->gioiTinh == '0' ? 'checked' : ''}}>
        <label for="nam">Nam</label><br>
        <input type="radio" id="nu" name="gioiTinh" value="1" {{$nhanVien->gioiTinh == '1' ? 'checked' : ''}}>
        <label for="nu">Nữ</label><br>
        <input type="radio" id="khac" name="gioiTinh" value="2" {{$nhanVien->gioiTinh == '2' ? 'checked' : ''}}>
        <label for="khac">Khác</label>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="inputNgaySinh">Ngày sinh @if ($errors->has('ngaySinh'))<p class="text-error">*{{$errors->first('ngaySinh')}}</p>@endif</label>
                <input type="date" class="form-control" name="ngaySinh" id="inputNgaySinh" value="{{$nhanVien->ngaySinh}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputThuongTru">Thường trú @if ($errors->has('thuongTru'))<p class="text-error">*{{$errors->first('thuongTru')}}</p>@endif</label>
                <input type="text" class="form-control" name="thuongTru" id="inputThuongTru" value="{{$nhanVien->thuongTru}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputTamTru">Tạm trú @if ($errors->has('tamTru'))<p class="text-error">*{{$errors->first('tamTru')}}</p>@endif</label>
                <input type="text" class="form-control" name="tamTru" id="inputTamTru" value="{{$nhanVien->tamTru}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputCCCD">Căn cước công dân @if ($errors->has('cccd'))<p class="text-error">*{{$errors->first('cccd')}}</p>@endif</label>
                <input type="text" class="form-control" name="cccd" id="inputCCCD" value="{{$nhanVien->cccd}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputHocVan">Học vấn @if ($errors->has('hocVan'))<p class="text-error">*{{$errors->first('hocVan')}}</p>@endif</label>
                <input type="text" class="form-control" name="hocVan" id="inputHocVan" value="{{$nhanVien->hocVan}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNgoaiNgu">Ngoại ngữ @if ($errors->has('ngoaiNgu'))<p class="text-error">*{{$errors->first('ngoaiNgu')}}</p>@endif</label>
                <input type="text" class="form-control" name="ngoaiNgu" id="inputNgoaiNgu" value="{{$nhanVien->ngoaiNgu}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-4">
                <label for="inputPhongBan">Phòng ban @if ($errors->has('maphong_id'))<p class="text-error">*{{$errors->first('maphong_id')}}</p>@endif</label>
                <select name="maphong_id" style="width: 20%; height: 50px; margin-left: 17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listPhongBan as $phongBan)
                    <option value="{{$phongBan->id}}" {{$nhanVien->maphong_id == $phongBan->id ? 'selected' : ''}}>{{$phongBan->tenPhong}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-4">
                <label for="inputChucVu">Chức vụ @if ($errors->has('chucvu_id'))<p class="text-error">*{{$errors->first('chucvu_id')}}</p>@endif</label>
                <select name="chucvu_id" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listChucVu as $chucVu)
                    <option value="{{$chucVu->id}}" {{$nhanVien->chucvu_id == $chucVu->id ? 'selected' : ''}}>{{$chucVu->tenChucVu}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputNganHang">Ngân hàng @if ($errors->has('nganHang'))<p class="text-error">*{{$errors->first('nganHang')}}</p>@endif</label>
                <input type="text" class="form-control" name="nganHang" id="inputNganHang" value="{{$nhanVien->nganHang}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputSTK">Số tài khoản @if ($errors->has('stk'))<p class="text-error">*{{$errors->first('stk')}}</p>@endif</label>
                <input type="text" class="form-control" name="stk" id="inputSTK" value="{{$nhanVien->stk}}">
            </div>
        </div>
    </div>

    <a href="{{route('admin.nhanvien.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection
