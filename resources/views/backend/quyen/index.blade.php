@extends('backend.layout.master')
@section('title')
    Danh sách Quyền
@endsection
@section('title-chucnang')
    Chức năng quản trị Quyền
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
    <a  href="{{route('backend.quyen.create')}}" class="btn btn-success" id="button">Thêm mới Quyền</a>
    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Quyền</th>
        <th>Tên Quyền</th>
        <th>Diễn giải</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($quyen as $quyen)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$quyen ->q_ma}}</th>
                <th>{{$quyen ->q_ten}}</th>
                <th>{{$quyen ->q_dienGiai}}</th>

                <th>
                    <a href="{{route('backend.quyen.edit',['id' =>$quyen->q_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="q_xoa" action='{{route('backend.quyen.destroy',['id' =>$quyen->q_ma])}}'>
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
          var r = confirm("Bạn có muốn xóa Quyền này không?");
          if (r == true) {
            document.getElementById("q_xoa").click();
          } else {

          }
        }
        </script>
@endsection
