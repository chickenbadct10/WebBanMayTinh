@extends('backend.layout.master')
@section('title')
    Danh sách Phương Thức thanh toán
@endsection
@section('title-chucnang')
    Chức năng quản trị Phương Thức thanh toán
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách Phương Thức Thanh Toán</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
        <script>
                function myFunction() {
                  document.getElementById("button").click();
                }
        </script>
<div class="container">
  <button type="submit" class="btn btn-success" onclick="myFunction()">Thêm mới</button>
  <a  href="{{route('backend.thanhtoan.create')}}" style="display:none" id="button"></a>
  <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Thanh toán mã</th>
        <th>Thanh toán tên</th>
        <th>Diễn giải</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
          @foreach ($thanhtoan as $thanhtoan)
          <tr>
            <th>{{$loop->index + 1}}</th>
            <th>{{$thanhtoan->tt_ma}}</th>
            <th>{{$thanhtoan->tt_ten}}</th>
            <th>{{$thanhtoan->tt_dienGiai}}</th>

            <th>
                    <a class="btn btn-primary"  href="{{route('backend.thanhtoan.edit',['id' =>$thanhtoan->tt_ma])}}">Sửa</a>
            </th>
            <th>
                    <form method="post" action='{{route('backend.thanhtoan.destroy',['id' =>$thanhtoan->tt_ma])}}'>
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
