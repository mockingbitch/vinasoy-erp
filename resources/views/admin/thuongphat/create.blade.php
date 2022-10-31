@extends('dashboardLayout')
@section('content')
<link href = "{{asset('dashboard/assets/css/autocomplete.css')}}"
rel = "stylesheet">
<script src = "{{asset('dashboard/assets/js/jquery-1.js')}}"></script>
<script src = "{{asset('dashboard/assets/js/jquery-2.js')}}"></script>
<script>
    $(document).ready(function() {
        var listSuggest = null;
        var url = '{{route('getListNhanVienSuggest')}}'
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
<h2>Thêm mới thưởng phạt</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post">
     @csrf
    <div class="form-group mt-4 ui-widget">
        <label for = "automplete-3">Tên nhân viên @if ($errors->has('tenPhong'))<p class="text-error">*{{$errors->first('tenPhong')}}</p>@endif</label>
        <input type="text" name="tenNhanVien" class="form-control" id="automplete-3" aria-describedby="nameHelp">
    </div> 
    <div class="form-group mt-4">
        <label for="inputGhiChu">Ghi chú @if ($errors->has('ghiChu'))<p class="text-error">*{{$errors->first('ghiChu')}}</p>@endif</label>
        <input type="text" name="ghiChu" class="form-control" id="inputGhiChu" aria-describedby="nameHelp">
    </div>
    <div class="form-group mt-4">
        <label for="inputTrangThai">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
        <select name="trangThai" style="width:20%;height:50px;margin-left:17px " class="select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option value=''>-----------Trạng thái---------</option>
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <a href="{{route('admin.phongban.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
