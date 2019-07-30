@extends('backend.layout.master')
@section('title')
    Danh sách chủ đề
@endsection
@section('title-chucnang')
    Chức năng quản trị Chủ Đề
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
    <a  href="{{route('backend.chude.create')}}" class="btn btn-success" id="button">Thêm mới chủ đề</a>
    <a  href="{{route('backend.chude.pdf')}}" class="btn btn-danger" id="button">Xuất pdf chủ đề</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã chủ đề</th>
        <th>Tên chủ đề</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($danhsachchude as $chude)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$chude ->cd_ma}}</th>
                <th>{{$chude ->cd_ten}}</th>
                <th>
                    <a href="{{route('backend.chude.edit',['id' =>$chude->cd_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="cd_xoa" action='{{route('backend.chude.destroy',['id' =>$chude->cd_ma])}}'>
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                            <button class="btn btn-danger" onclick="myFunction();">Xóa </button>
                        </form>
                </th>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $danhsachchude->links() }}

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
