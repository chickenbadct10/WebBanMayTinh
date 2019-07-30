@extends('backend.layout.master')
@section('title')
    Danh sách Phương Thức Vận Chuyển
@endsection
@section('title-chucnang')
    Chức năng quản trị Phương Thức Vận Chuyển
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách Phương Thức Vận Chuyển</title>
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
  <a  href="{{route('backend.vanchuyen.create')}}" style="display:none" id="button"></a>
  <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Vận chuyển mã</th>
        <th>Vận chuyển tên</th>
        <th>Chi phí</th>
        <th>Diễn giải</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
          @foreach ($vanchuyen as $vanchuyen)
          <tr>
            <th>{{$loop->index + 1}}</th>
            <th>{{$vanchuyen->vc_ma}}</th>
            <th>{{$vanchuyen->vc_ten}}</th>
            <th>{{$vanchuyen->vc_chiPhi}}</th>
            <th>{{$vanchuyen->vc_dienGiai}}</th>

            <th>
                    <a class="btn btn-primary"  href="{{route('backend.vanchuyen.edit',['id' =>$vanchuyen->vc_ma])}}">Sửa</a>
            </th>
            <th>
                    <form method="post" action='{{route('backend.vanchuyen.destroy',['id' =>$vanchuyen->vc_ma])}}'>
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
