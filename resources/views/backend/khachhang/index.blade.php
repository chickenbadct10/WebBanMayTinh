@extends('backend.layout.master')
@section('title')
    Danh sách Khách hàng
@endsection
@section('title-chucnang')
    Chức năng quản trị Khách hàng
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
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
    <a  href="{{route('backend.khachhang.create')}}" class="btn btn-success" id="button">Thêm mới Khách hàng</a>
    <br/>
    <div class="table-responsive-sm">
            <table class="table ">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã khách hàng</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Email</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Trạng thái</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($khachhang as $khachhang)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$khachhang ->kh_ma}}</th>
                <th>{{$khachhang ->kh_hoTen}}</th>
                <th>{{$khachhang ->kh_gioiTinh == 1 ? "Nam" : "Nữ"}}</th>
                <th>{{$khachhang ->kh_email}}</th>
                <th>{{$khachhang ->kh_ngaySinh->format('d-m-Y')}}</th>
                <th>{{$khachhang ->kh_diaChi}}</th>
                <th>{{$khachhang ->kh_dienThoai}}</th>
                <th>{{$khachhang ->kh_trangThai == 2 ? "Khả dụng" : "Chưa kích hoạt hoặc tạm khóa"}}</th>
                <th>
                    <a href="{{route('backend.khachhang.edit',['id' =>$khachhang->kh_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="m_xoa" action='{{route('backend.khachhang.destroy',['id' =>$khachhang->kh_ma])}}'>
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
</div>

</body>
</html>
@endsection
