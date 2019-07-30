@extends('backend.layout.master')

@section('title')
Thêm mới Nhà cung cấp
@endsection

@section('feature-title')
Thêm mới Nhà cung cấp
@endsection

@section('feature-description')
Thêm mới Nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<!-- Thêm mã hóa để có thể upload file -->
<form method="post" action="{{ route('backend.nhacungcap.store') }}">
        @csrf
    <div class="form-group">
        <label for="xx_ma">Xuất xứ</label>
        <select name="xx_ma" class="form-control">
            @foreach($xuatxu as $xx)
                @if(old('xx_ma') == $xx->xx_ma)
                <option value="{{ $xx->xx_ma }}" selected>{{ $xx->xx_ten }}</option>
                @else
                <option value="{{ $xx->xx_ma }}">{{ $xx->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ old('ncc_ten') }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Người đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" value="{{ old('ncc_daiDien') }}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" value="{{ old('ncc_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" value="{{ old('ncc_dienThoai') }}">
</div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="email" class="form-control" id="ncc_email" name="ncc_email" value="{{ old('ncc_email') }}">
    </div>
    <div class="form-group">
    <select name="ncc_trangThai" class="form-control">
        <option value="1" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('ncc_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <button class="btn btn-primary">Cập nhật</button>
    <a type="button" href="{{route('backend.nhacungcap.index')}}" class="btn btn-warning">Trở về</a>

</form>
@endsection
