@extends('backend.layout.master')
@section('title')
    Danh sách Góp ý
@endsection
@section('title-chucnang')
    Chức năng quản trị Góp ý
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
    <a  href="{{route('backend.gopy.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Góp ý</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Nội dung góp ý</th>
        <th>Thời gian góp ý</th>
        <th>Khách hàng góp ý</th>
        <th>Tên Sản phẩm</th>
        <th>Trạng thái</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($gopy as $gy)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$gy ->gy_noiDung}}</th>
                <th>{{$gy ->gy_thoiGian}}</th>
                <th>{{$gy ->khachHang->kh_hoTen}}</th>
                <th>{{$gy ->sanPham->sp_ten}}</th>
                <th>
                        <select name="gy_trangThai" class="form-control" disabled="true">
                            <option value="1" {{ $gy->gy_trangThai == 1 ? "selected" : "" }}>Khóa</option>
                            <option value="2" {{ $gy->gy_trangThai == 2 ? "selected" : "" }}>Khả dụng</option>
                            <option value="3" {{ $gy->gy_trangThai == 3 ? "selected" : "" }}>Chờ duyệt</option>
                        </select>
                </th>
                <th>
                    <a href="{{route('backend.gopy.edit',['id' =>$gy->gy_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="gopy_xoa" action='{{route('backend.gopy.destroy',['id' =>$gy->gy_ma])}}'>
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
