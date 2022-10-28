@extends('dashboardLayout')
@section('content')
<h2>Quản lý hợp đồng: {{$nhanVien->hoTen}}</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputLoaiHD">Loại hợp đồng lao động @if ($errors->has('loaiHDLD'))<p class="text-error">*{{$errors->first('loaiHDLD')}}</p>@endif</label>
        <input type="text" name="loaiHDLD" class="form-control" id="inputLoaiHD" aria-describedby="nameHelp" value="{{$hdld->loaiHDLD ?? ''}}">
    </div> 
    <div class="row">
        <div class="form-group col-3 mt-4">
            <label for="inputStartDate">Ngày bắt đầu @if ($errors->has('ngayBatDau'))<p class="text-error">*{{$errors->first('ngayBatDau')}}</p>@endif</label>
            <input type="date" name="ngayBatDau" class="form-control" id="inputStartDate" aria-describedby="nameHelp" value="{{$hdld->ngayBatDau ?? ''}}">
        </div>
        <div class="form-group col-3 mt-4">
            <label for="inputEndDate">Ngày kết thúc @if ($errors->has('ngayKetThuc'))<p class="text-error">*{{$errors->first('ngayKetThuc')}}</p>@endif</label>
            <input type="date" name="ngayKetThuc" class="form-control" id="inputEndDate" aria-describedby="nameHelp" value="{{$hdld->ngayKetThuc ?? ''}}">
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="inputLocation">Địa điểm làm việc @if ($errors->has('diaDiemLamViec'))<p class="text-error">*{{$errors->first('diaDiemLamViec')}}</p>@endif</label>
        <input type="text" name="diaDiemLamViec" class="form-control" id="inputLocation" aria-describedby="nameHelp" value="{{$hdld->diaDiemLamViec ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputNgachLuong">Ngạch lương @if ($errors->has('ngachLuong'))<p class="text-error">*{{$errors->first('ngachLuong')}}</p>@endif</label>
        <input type="text" name="ngachLuong" class="form-control" id="inputNgachLuong" aria-describedby="nameHelp" value="{{$hdld->ngachLuong ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputBacLuong">Bậc lương @if ($errors->has('bacLuong'))<p class="text-error">*{{$errors->first('bacLuong')}}</p>@endif</label>
        <input type="text" name="bacLuong" class="form-control" id="inputBacLuong" aria-describedby="nameHelp" value="{{$hdld->bacLuong ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputHeSoLuong">Hệ số lương @if ($errors->has('heSoLuong'))<p class="text-error">*{{$errors->first('heSoLuong')}}</p>@endif</label>
        <input type="text" name="heSoLuong" class="form-control" id="inputHeSoLuong" aria-describedby="nameHelp" value="{{$hdld->heSoLuong ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputPhuCap">Phụ cấp @if ($errors->has('phuCap'))<p class="text-error">*{{$errors->first('phuCap')}}</p>@endif</label>
        <input type="text" name="phuCap" class="form-control" id="inputPhuCap" aria-describedby="nameHelp" value="{{$hdld->phuCap ?? ''}}" placeholder="{{number_format((int) $hdld->phuCap) ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputNguoiKy">Người ký @if ($errors->has('nguoiKy'))<p class="text-error">*{{$errors->first('nguoiKy')}}</p>@endif</label>
        <input type="text" name="nguoiKy" class="form-control" id="inputNguoiKy" aria-describedby="nameHelp" value="{{$hdld->nguoiKy ?? ''}}">
    </div>
    <div class="row">
        <div class="form-group col-3 mt-4">
            <label for="inputNgayKy">Ngày ký @if ($errors->has('ngayKy'))<p class="text-error">*{{$errors->first('ngayKy')}}</p>@endif</label>
            <input type="date" name="ngayKy" class="form-control" id="inputNgayKy" aria-describedby="nameHelp" value="{{$hdld->ngayKy ?? ''}}">
        </div>
    </div>

    <a href="{{route('admin.nhanvien.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection
