@extends('warehouseLayout')
@section('content')
<h2>Cập nhật danh mục</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputTenDanhMuc">Tên danh mục @if ($errors->has('tenDanhMuc'))<p class="text-error">*{{$errors->first('tenDanhMuc')}}</p>@endif</label>
        <input type="text" name="tenDanhMuc" class="form-control" id="inputTenDanhMuc" aria-describedby="nameHelp" value="{{$danhMuc->tenDanhMuc}}">
    </div> 
    <div class="form-group mt-4">
        <label for="inputMoTa">Mô tả @if ($errors->has('moTa'))<p class="text-error">*{{$errors->first('moTa')}}</p>@endif</label>
        <input type="text" name="moTa" class="form-control" id="inputMoTa" aria-describedby="nameHelp" value="{{$danhMuc->moTa}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="1" {{$danhMuc->trangThai == '1' ? 'selected' : ''}}>Hiển thị</option>
            <option value="0" {{$danhMuc->trangThai == '0' ? 'selected' : ''}}>Ẩn</option>
        </select>
    </div>

    <a href="{{route('warehouse.danhmuc.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@endsection
