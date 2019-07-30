@extends('backend.layout.master')
@section('title')
    Danh sách Hình ảnh
@endsection
@section('title-chucnang')
    Chức năng quản trị Hình ảnh
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
    <a  href="{{route('backend.hinhanh.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Hình ảnh</a>
    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Sản phẩm</th>
        <th>Hình ảnh tên</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($hinhanh as $ha)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$ha ->sp_ma}}</th>
                <th>{{$ha ->ha_ten}}</th>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
@endsection
@section('custom-js')
@endsection
