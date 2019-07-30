@extends('backend.layout.master')
@section('title')
    Danh sách Xuất xứ
@endsection
@section('title-chucnang')
    Chức năng quản trị Xuất xứ
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
    <a  href="{{route('backend.xuatxu.create')}}" class="btn btn-success" id="button">Thêm mới Xuất xứ</a>
    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Xuất xứ</th>
        <th>Tên Xuất xứ</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($xuatxu as $xuatxu)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$xuatxu ->xx_ma}}</th>
                <th>{{$xuatxu ->xx_ten}}</th>
                <th>
                    <a href="{{route('backend.xuatxu.edit',['id' =>$xuatxu->xx_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="xx_xoa" action='{{route('backend.xuatxu.destroy',['id' =>$xuatxu->xx_ma])}}'>
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
