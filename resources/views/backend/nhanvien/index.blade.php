@extends('backend.layout.master')
@section('title')
    Danh sách Nhân viên
@endsection
@section('title-chucnang')
    Chức năng quản trị nhân viên
@endsection
@section('feature-description')
Trở về trang chủ
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/popperjs/popper.min.js')}}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
        <script>
                function myFunction() {
                  document.getElementById("button").click();
                }
        </script>
<div class="container">
    <a  href="{{route('backend.nhanvien.create')}}" class="btn btn-primary" id="button">Thêm mới Nhân viên</a>
    <a  href="{{route('backend.nhanvien.print')}}" class="btn btn-success" id="button">In danh sách Nhân viên</a>
    <a  href="{{route('backend.nhanvien.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Nhân viên</a>
    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Nhân viên</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Email</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Quyền</th>

        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($nhanvien as $nv)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$nv ->nv_ma}}</th>
                <th>{{$nv ->nv_hoTen}}</th>
                <th>{{$nv ->nv_gioiTinh == 1 ? "Nam": "Nữ"}}</th>
                <th>{{$nv ->nv_email}}</th>
                <th>{{$nv ->nv_ngaySinh}}</th>
                <th>{{$nv ->nv_diaChi}}</th>
                <th>{{$nv ->nv_dienThoai}}</th>
                <th>{{$nv ->quyenNhanVien->q_ten}}</th>
                <th>{{$nv ->nv_trangThai == 1?"Khóa":"Khả dụng"}}</th>

                <th>
                    <a href="{{route('backend.nhanvien.edit',['id' =>$nv->nv_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="m_xoa" action='{{route('backend.nhanvien.destroy',['id' =>$nv->nv_ma])}}'>
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                            <button class="btn btn-danger">Xóa </button>
                        </form>
                </th>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
@endsection
@section('custom-js')
<script>
        function myFunction() {
          var r = confirm("Bạn có muốn xóa chủ đề này không?");
          if (r == true) {
            document.getElementById("cd_xoa").click();
          } else {

          }
        }
</script>
@endsection
