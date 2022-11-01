@extends('dashboardLayout')
@section('content')
<link href = "{{asset('dashboard/assets/css/autocomplete.css')}}"
rel = "stylesheet">
<script src = "{{asset('dashboard/assets/js/jquery-1.js')}}"></script>
<script src = "{{asset('dashboard/assets/js/jquery-2.js')}}"></script>
<script>
    $(document).ready(function() {
        var listSuggest = null;
        var url = '{{route('getListSanPhamSuggest')}}'
        $.ajax({
            url: url,
            type: 'get',
            success: function(data) {
                listSuggest = data;
                autocomplete(data);
            }
        });
    });
    
    function autocomplete(data) {
        console.log(data);
        $( "#automplete-3" ).autocomplete({
            minLength:2,   
            delay:500,   
            source: data
        });
    }
    
 </script>
<h2>Nhập xuất hàng</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post">
     @csrf
    <div class="form-group mt-4 ui-widget">
        <label for = "automplete-3">Tên sản phẩm @if ($errors->has('sanpham'))<p class="text-error">*{{$errors->first('sanpham')}}</p>@endif</label>
        <input type="text" name="sanpham" class="form-control" id="automplete-3" aria-describedby="nameHelp">
    </div>
    <div class="form-group mt-4">
        <label for="inputNhaCC">Nhà cung cấp @if ($errors->has('nhacungcap_id'))<p class="text-error">*{{$errors->first('nhacungcap_id')}}</p>@endif</label>
        <select name="nhacungcap_id" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            @foreach ($listNhaCC as $nhacc)
                <option value="{{$nhacc->id}}">{{$nhacc->tenNhaCC}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-4">
        <label for="inputSoLuong">Số lượng @if ($errors->has('soLuong'))<p class="text-error">*{{$errors->first('soLuong')}}</p>@endif</label>
        <input type="number" name="soLuong" class="form-control" id="inputSoQuyetDinh" aria-describedby="nameHelp">
    </div>
    <div class="form-group mt-4">
        <label for="inputType">Kiểu @if ($errors->has('type'))<p class="text-error">*{{$errors->first('type')}}</p>@endif</label>
        <select name="type" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value="0">Nhập</option>
            <option value="1">Xuất</option>
        </select>
    </div>

    <a href="{{route('warehouse.nhapxuat.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
