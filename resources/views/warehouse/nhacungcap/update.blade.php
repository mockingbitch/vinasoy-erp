@extends('warehouseLayout')
@section('content')
<h2>Cập nhật nhà cung cấp</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputNhaCungCap">Tên nhà cung cấp @if ($errors->has('tenNhaCC'))<p class="text-error">*{{$errors->first('tenNhaCC')}}</p>@endif</label>
        <input type="text" name="tenNhaCC" class="form-control" id="inputNhaCungCap" aria-describedby="nameHelp" value="{{$nhacc->tenNhaCC}}">
    </div> 
    <div class="form-group mt-4">
        <label for="inputMaSoThue">Mã số thuế @if ($errors->has('maSoThue'))<p class="text-error">*{{$errors->first('maSoThue')}}</p>@endif</label>
        <input type="text" name="maSoThue" class="form-control" id="inputMaSoThue" aria-describedby="nameHelp" value="{{$nhacc->maSoThue}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputSDT">Số điện thoại @if ($errors->has('sdt'))<p class="text-error">*{{$errors->first('sdt')}}</p>@endif</label>
        <input type="text" name="sdt" class="form-control" id="inputSDT" aria-describedby="nameHelp" value="{{$nhacc->sdt}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputEmail">Email @if ($errors->has('email'))<p class="text-error">*{{$errors->first('email')}}</p>@endif</label>
        <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="nameHelp" value="{{$nhacc->email}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputFAX">FAX @if ($errors->has('fax'))<p class="text-error">*{{$errors->first('fax')}}</p>@endif</label>
        <input type="text" name="fax" class="form-control" id="inputFAX" aria-describedby="nameHelp" value="{{$nhacc->fax}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputWebsite">Website @if ($errors->has('website'))<p class="text-error">*{{$errors->first('website')}}</p>@endif</label>
        <input type="text" name="website" class="form-control" id="inputWebsite" aria-describedby="nameHelp" value="{{$nhacc->website}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputDiaChi">Địa chỉ @if ($errors->has('diaChi'))<p class="text-error">*{{$errors->first('diaChi')}}</p>@endif</label>
        <input type="text" name="diaChi" class="form-control" id="inputDiaChi" aria-describedby="nameHelp" value="{{$nhacc->diaChi}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="1" {{$nhacc->trangThai == '1' ? 'selected' : ''}}>Hiển thị</option>
            <option value="0" {{$nhacc->trangThai == '0' ? 'selected' : ''}}>Ẩn</option>
        </select>
    </div>

    <a href="{{route('warehouse.nhacungcap.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection
