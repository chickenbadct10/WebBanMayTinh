@extends('backend.layout.master')

@section('title')
Thêm mới Nhân viên
@endsection

@section('feature-title')
Thêm mới Nhân viên
@endsection

@section('feature-description')
Thêm mới Nhân viên. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<!-- Thêm mã hóa để có thể upload file -->
<form method="post" action="{{ route('backend.nhanvien.store') }}">
        @csrf
    <div class="form-group">
        <label for="q_ma">Quyền</label>
        <select name="q_ma" class="form-control">
            @foreach($quyen as $q)
                @if(old('q_ma') == $q->q_ma)
                <option value="{{ $q->q_ma }}" selected>{{ $q->q_ten }}</option>
                @else
                <option value="{{ $q->q_ma }}">{{ $q->q_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="nv_taiKhoan" name="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nv_matKhau" name="nv_matKhau" value="{{ old('nv_matKhau') }}">
    </div>
    <div class="form-group">
        <label for="nv_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="nv_hoTen" name="nv_hoTen" value="{{ old('nv_hoTen') }}">
    </div>
    <div class="form-group">
            <label for="nv_gioiTinh"> Giới tính:</label>
            <br/>
        <label class="btn btn-light">
            <input type="radio" name="nv_gioiTinh" id="nv_gioiTinh" value="1"> Nam
          </label>
          <label class="btn btn-light">
            <input type="radio" name="nv_gioiTinh" id="nv_gioiTinh" value="0"> Nữ
          </label>
          <small id="nv_gioiTinhHelp" class="form-text text-muted">Chọn giới tính khách hàng</small>
        </div>
    <div class="form-group">
        <label for="nv_email">Email</label>
        <input type="email" class="form-control" id="nv_email" name="nv_email" value="{{ old('nv_email') }}">
    </div>
    <div class="form-group">
        <label for="nv_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" value="{{ old('nv_ngaySinh') }}">
    </div>
    <div class="form-group">
            <label for="nv_diaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="nv_diaChi" name="nv_diaChi" value="{{ old('nv_diaChi') }}">
    </div>
    <div class="form-group">
            <label for="nv_dienThoai">Điện thoại</label>
            <input type="text" class="form-control" id="nv_dienThoai" name="nv_dienThoai" value="{{ old('nv_dienThoai') }}">
    </div>
    <div class="form-group">
    <select name="nv_trangThai" class="form-control">
        <option value="1" {{ old('nv_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('nv_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <button class="btn btn-primary">Cập nhật</button>
    <a type="button" href="{{route('backend.nhanvien.index')}}" class="btn btn-warning">Trở về</a>

</form>
@endsection
