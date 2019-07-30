@extends('backend.layout.master')
@section('title')
    Danh sách Góp ý
@endsection
@section('title-chucnang')
    Chức năng quản trị Góp ý
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form method="post" action="{{route('backend.gopy.update',['id' =>$gopy->gy_ma])}}}">
        @csrf
        <form>
            <input type="hidden" name="_method" value="PUT"/>
            <div class="form-group">
                <label for="gy_noiDung">Nội dung góp ý</label>
                <input type="text" class="form-control" id="gy_noiDung" name="gy_noiDung" value="{{ old('gy_noiDung', $gopy->gy_noiDung) }}">
            </div>
            <div class="form-group">
                <select name="gy_trangThai" class="form-control">
                    <option value="1" {{ old('gy_trangThai',$gopy->gy_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
                    <option value="2" {{ old('gy_trangThai',$gopy->gy_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="3" {{ old('gy_trangThai',$gopy->gy_trangThai) == 3 ? "selected" : "" }}>Chờ duyệt</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a type="button" href="{{route('backend.gopy.index')}}" class="btn btn-warning">Trở về</a>

        </form>
</form>
@endsection
