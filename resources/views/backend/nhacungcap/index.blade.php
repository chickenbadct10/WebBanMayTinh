@extends('backend.layout.master')
@section('title')
    Danh sách Nhà cung cấp
@endsection
@section('title-chucnang')
    Chức năng quản trị Nhà cung cấp
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
    <a  href="{{route('backend.nhacungcap.create')}}" class="btn btn-primary" id="button">Thêm mới Nhà cung cấp</a>
    <a  href="{{route('backend.nhacungcap.print')}}" class="btn btn-success" id="button">In danh sách Nhà cung cấp</a>
    <a  href="{{route('backend.nhacungcap.pdf')}}" class="btn btn-danger" id="button">Xuất file pdf Nhà cung cấp</a>


    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Nhà cung cấp</th>
        <th>Tên nhà cung cấp</th>
        <th>Người đại diện</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Xuất xứ</th>
        <th>Trạng thái</th>

        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($nhacungcap as $ncc)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$ncc ->ncc_ma}}</th>
                <th>{{$ncc ->ncc_ten}}</th>
                <th>{{$ncc ->ncc_daiDien}}</th>
                <th>{{$ncc ->ncc_diaChi}}</th>
                <th>{{$ncc ->ncc_dienThoai}}</th>
                <th>{{$ncc ->ncc_email}}</th>
                <th>{{$ncc ->xuatXu->xx_ten}}</th>
                <th>{{$ncc ->ncc_trangThai == 1?"Khóa":"Khả dụng"}}</th>

                <th>
                    <a href="{{route('backend.nhacungcap.edit',['id' =>$ncc->ncc_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="m_xoa" action='{{route('backend.nhacungcap.destroy',['id' =>$ncc->ncc_ma])}}'>
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
