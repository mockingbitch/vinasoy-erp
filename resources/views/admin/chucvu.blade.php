@extends('dashboardLayout')
@section('content')
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputTenChucVu">Tên chức vụ @if ($errors->has('tenChucVu'))<p class="text-error">*{{$errors->first('tenChucVu')}}</p>@endif</label>
        <input type="text" name="tenChucVu" class="form-control" id="inputTenChucVu" aria-describedby="nameHelp">
    </div>
    <div class="form-group mt-4">
        <label for="inputGhiChu">Ghi chú @if ($errors->has('ghiChu'))<p class="text-error">*{{$errors->first('ghiChu')}}</p>@endif</label>
        <input type="text" name="ghiChu" class="form-control" id="inputGhiChu" aria-describedby="nameHelp">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <input type="text" name="trangThai" class="form-control" id="inputTrangThai" aria-describedby="nameHelp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
