@extends('dashboardLayout')
@section('content')
<h2>Thêm mới phòng ban</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post">
     @csrf
    <div class="form-group mt-4">
        <label for="inputTenPhong">Tên phòng ban @if ($errors->has('tenPhong'))<p class="text-error">*{{$errors->first('tenPhong')}}</p>@endif</label>
        <input type="text" name="tenPhong" class="form-control" id="inputTenPhong" aria-describedby="nameHelp" value="{{Request::old('tenPhong')}}">
    </div> 
    <div class="form-group mt-4">
        <label for="inputGhiChu">Ghi chú @if ($errors->has('ghiChu'))<p class="text-error">*{{$errors->first('ghiChu')}}</p>@endif</label>
        <input type="text" name="ghiChu" class="form-control" id="inputGhiChu" aria-describedby="nameHelp" value="{{Request::old('ghiChu')}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <a href="{{route('admin.phongban.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
