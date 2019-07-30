@extends('backend.layout.master')
@section('title')
    Danh sách Sản phẩm
@endsection
@section('title-chucnang')
    Chức năng quản trị sản phẩm
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
    <a  href="{{route('backend.sanpham.create')}}" class="btn btn-primary" id="button">Thêm mới Sản phẩm</a>
    <a  href="{{route('backend.sanpham.print')}}" class="btn btn-success" id="button">In danh sách Sản phẩm</a>
    <a  href="{{route('backend.sanpham.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Sản phẩm</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình</th>
        <th>Giá gốc</th>
        <th>Giá bán</th>
        <th>Thông tin</th>
        <th>Đánh giá</th>
        <th>Loại sản phẩm</th>

        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($danhsachsanpham as $sanpham)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$sanpham ->sp_ma}}</th>
                <th>{{$sanpham ->sp_ten}}</th>
                <th>
                    <img src="{{asset('storage/photos/'.$sanpham->sp_hinh)}}" class="sanpham-thumbnail"/>
                </th>
                <th>{{$sanpham ->sp_giaGoc}}</th>
                <th>{{$sanpham ->sp_giaBan}}</th>
                <th>{{$sanpham ->sp_thongtin}}</th>
                <th>{{$sanpham ->sp_danhGia}}</th>
                <th>{{$sanpham ->loaisanpham->l_ten}}</th>

                <th>
                    <a href="{{route('backend.sanpham.edit',['id' =>$sanpham->sp_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="m_xoa" action='{{route('backend.sanpham.destroy',['id' =>$sanpham->sp_ma])}}'>
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                            <button class="btn btn-danger">Xóa </button>
                        </form>
                </th>
            </tr>
        @endforeach
    </tbody>
  </table>
{{ $danhsachsanpham->links() }}

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
