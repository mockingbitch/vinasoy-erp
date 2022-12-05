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
        <input type="text" name="tenNhanVien" class="form-control" id="automplete-3" aria-describedby="nameHelp" value="{{Request::old('tenNhanVien')}}">
    </div> 
    <div class="form-group mt-4">
        <label for="inputHinhThuc">Hình thức @if ($errors->has('hinhThuc'))<p class="text-error">*{{$errors->first('hinhThuc')}}</p>@endif</label>
        <input type="text" name="hinhThuc" class="form-control" id="inputHinhThuc" aria-describedby="nameHelp" value="{{Request::old('hinhThuc')}}">
    </div>
    <div class="row">
        <div class="form-group mt-4 col-6">
            <label for="inputSoQuyetDinh">Số quyết định @if ($errors->has('soQuyetDinh'))<p class="text-error">*{{$errors->first('soQuyetDinh')}}</p>@endif</label>
        <input type="text" name="soQuyetDinh" class="form-control" id="inputSoQuyetDinh" aria-describedby="nameHelp" value="{{Request::old('soQuyetDinh')}}">
        </div>
        <div class="form-group mt-4 col-6">
            <label for="inputNgayQuyetDinh">Ngày quyết định @if ($errors->has('ngayQuyetDinh'))<p class="text-error">*{{$errors->first('ngayQuyetDinh')}}</p>@endif</label>
            <input type="date" name="ngayQuyetDinh" class="form-control" id="inputNgayQuyetDinh" aria-describedby="nameHelp" value="{{Request::old('ngayQuyetDinh')}}">
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="inputLyDo">Lý do @if ($errors->has('lyDo'))<p class="text-error">*{{$errors->first('lyDo')}}</p>@endif</label>
        <input type="text" name="lyDo" class="form-control" id="inputLyDo" aria-describedby="nameHelp" value="{{Request::old('lyDo')}}">
    </div>
    <div class="row">
        <div class="form-group mt-4 col-6">
            <label for="inputMucPhat">Mức phạt @if ($errors->has('mucPhat'))<p class="text-error">*{{$errors->first('mucPhat')}}</p>@endif</label>
            <input type="number" name="mucPhat" class="form-control" id="inputMucPhat" aria-describedby="nameHelp" value="{{Request::old('mucPhat')}}">
        </div>
        <div class="form-group mt-4 col-6">
            <label for="inputMucThuong">Mức thưởng @if ($errors->has('mucThuong'))<p class="text-error">*{{$errors->first('mucThuong')}}</p>@endif</label>
            <input type="number" name="mucThuong" class="form-control" id="inputMucPhat" aria-describedby="nameHelp" value="{{Request::old('mucThuong')}}">
        </div>
    </div>
    <div class="form-group mt-4">
        <label for="inputNguoiKy">Người ký @if ($errors->has('nguoiKy'))<p class="text-error">*{{$errors->first('nguoiKy')}}</p>@endif</label>
        <input type="text" name="nguoiKy" class="form-control" id="inputNguoiKy" aria-describedby="nameHelp" value="{{Request::old('nguoiKy')}}">
    </div>

    <a href="{{route('admin.klkt.list')}}"><input type="text" class="btn btn-secondary" value="Trở về" disabled></a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>

@endsection
