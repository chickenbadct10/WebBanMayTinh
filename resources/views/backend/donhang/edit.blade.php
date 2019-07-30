@extends('backend.layout.master')
@section('title')
    Danh sách Đơn hàng
@endsection
@section('title-chucnang')
    Chức năng quản trị Đơn hàng
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form method="post" action="{{route('backend.donhang.update',['id' =>$donhang->dh_ma])}}}">
        @csrf
        <form>
            <input type="hidden" name="_method" value="PUT"/>
            <div class="form-group">
                <label for="dh_ma">Mã đơn hàng</label>
                <input type="text" class="form-control" id="dh_ma" name="dh_ma" value="{{ old('dh_ma', $donhang->dh_ma) }}">
            </div>
            <div class="form-group">
                <select name="dh_trangThai" class="form-control">
                    <option value="1" {{ old('dh_trangThai',$donhang->dh_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('dh_trangThai',$donhang->dh_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="3" {{ old('dh_trangThai',$donhang->dh_trangThai) == 3 ? "selected" : "" }}>Chờ duyệt</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a type="button" href="{{route('backend.donhang.index')}}" class="btn btn-warning">Trở về</a>

        </form>
</form>
@endsection
