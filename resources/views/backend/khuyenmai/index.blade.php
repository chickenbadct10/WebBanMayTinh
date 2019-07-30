@extends('backend.layout.master')
@section('title')
    Danh sách Khuyến mãi
@endsection
@section('title-chucnang')
    Chức năng quản trị Khuyến mãi
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
    <a  href="{{route('backend.gopy.create')}}" class="btn btn-success" id="button">Thêm mới Khuyến mãi</a>
    <a  href="{{route('backend.gopy.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Khuyến mãi</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên khuyến mãi</th>
        <th>Nội dung khuyến mãi</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Giá trị khuyến mãi</th>
        <th>Tên người lập</th>
        <th>Ngày lập</th>
        <th>Tên người ký nháy</th>
        <th>Ngày ký nháy</th>
        <th>Tên người duyệt</th>
        <th>Ngày duyệt</th>
        <th>Trạng thái/th>

        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($khuyenmai as $km)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$km ->km_ten}}</th>
                <th>{{$km ->km_noiDung}}</th>
                <th>{{$km ->km_batDau}}</th>
                <th>{{$km ->km_ketThuc}}</th>
                <th>{{$km ->km_giaTri}}</th>
                <th>{{$km ->nhanVienLap->nv_hoTen}}</th>
                <th>{{$km ->km_ngayLap}}</th>
                <th>{{$km ->nhanVienKyNhay->nv_hoTen}}</th>
                <th>{{$km ->km_ngayKyNhay}}</th>
                <th>{{$km ->nhanVienKyDuyet->nv_hoTen}}</th>
                <th>{{$km ->km_ngayDuyet}}</th>
                <th>{{$km ->km_trangThai}}</th>

                <th>
                    <a href="{{route('backend.khuyenmai.edit',['id' =>$km->km_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="km_xoa" action='{{route('backend.khuyenmai.destroy',['id' =>$km->km_ma])}}'>
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
