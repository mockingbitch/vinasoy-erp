@extends('dashboardLayout')
@section('content')
<h2>Sửa đổi chức vụ</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputTenChucVu">Tên chức vụ @if ($errors->has('tenChucVu'))<p class="text-error">*{{$errors->first('tenChucVu')}}</p>@endif</label>
        <input type="text" name="tenChucVu" class="form-control" id="inputTenChucVu" aria-describedby="nameHelp" value="{{$chucVu->tenChucVu ?? ''}}">
    </div> 
    <div class="form-group mt-4">
        <label for="inputGhiChu">Ghi chú @if ($errors->has('ghiChu'))<p class="text-error">*{{$errors->first('ghiChu')}}</p>@endif</label>
        <input type="text" name="ghiChu" class="form-control" id="inputGhiChu" aria-describedby="nameHelp" value="{{$chucVu->ghiChu ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="0" {{$chucVu->trangThai == '0' ? 'selected' : ''}}>Ẩn</option>
            <option value="1" {{$chucVu->trangThai == '1' ? 'selected' : ''}}>Hiển thị</option>
        </select>
    </div>
    
    <a href="{{route('admin.chucvu.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection
