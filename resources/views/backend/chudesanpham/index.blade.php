@extends('backend.layout.master')
@section('title')
    Danh sách Chủ đề sản phẩm
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
    <a  href="{{route('backend.chudesanpham.create')}}" class="btn btn-success" id="button">Thêm mới Chủ đề sản phẩm</a>
    <a  href="{{route('backend.chudesanpham.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Chủ đề sản phẩm</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Tên chủ đề</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($chudesanpham as $cdsp)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$cdsp-> chude->cd_ten}}</th>
                <th>{{$cdsp->sanpham ->sp_ten}}</th>

                <th>
                    <a href="{{route('backend.chudesanpham.edit',['id' =>$cdsp->sp_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="gopy_xoa" action='{{route('backend.chudesanpham.destroy',['id' =>$cdsp->sp_ma])}}'>
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
