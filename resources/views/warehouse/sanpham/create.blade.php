@extends('warehouseLayout')
@section('content')
<h2>Thêm mới sản phẩm</h2> {{$msg ?? ''}}
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group mt-4">
        <label for="inputTenSP">Tên sản phẩm @if ($errors->has('tenSP'))<p class="text-error">*{{$errors->first('tenSP')}}</p>@endif</label>
        <input type="text" name="tenSP" class="form-control" id="inputTenSP" aria-describedby="nameHelp" value="{{$data['tenSP'] ?? ''}}">
    </div>
    <div class="row">
        <div class="form-group mt-4 col-6">
            <label for="inputDanhMuc">Danh mục @if ($errors->has('danhmuc_id'))<p class="text-error">*{{$errors->first('danhmuc_id')}}</p>@endif</label>
            <select name="danhmuc_id" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach ($listDanhMuc as $danhMuc)
                    <option value="{{$danhMuc->id}}">{{$danhMuc->tenDanhMuc}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-4 col-6">
            <label for="inputNCC">Nhà cung cấp @if ($errors->has('nhacungcap_id'))<p class="text-error">*{{$errors->first('nhacungcap_id')}}</p>@endif</label>
            <select name="nhacungcap_id" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach ($listNhaCC as $nhacc)
                    <option value="{{$nhacc->id}}">{{$nhacc->tenNhaCC}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="inputDonGia">Đơn giá @if ($errors->has('donGia'))<p class="text-error">*{{$errors->first('donGia')}}</p>@endif</label>
        <input type="number" name="donGia" class="form-control" id="inputDonGia" aria-describedby="nameHelp" value="{{$data['donGia'] ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputHinhAnh">Hình ảnh @if ($errors->has('img'))<p class="text-error">*{{$errors->first('img')}}</p>@endif</label>
        <input type="file" name="img" class="form-control" id="inputHinhAnh" aria-describedby="nameHelp" value="{{$data['img'] ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputMoTa">Mô tả @if ($errors->has('moTa'))<p class="text-error">*{{$errors->first('moTa')}}</p>@endif</label>
        <input type="text" name="moTa" class="form-control" id="inputMoTa" aria-describedby="nameHelp" value="{{$data['moTa'] ?? ''}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option>-----------Trạng thái---------</option>
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <a href="{{route('warehouse.danhmuc.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
