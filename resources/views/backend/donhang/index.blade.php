@extends('backend.layout.master')
@section('title')
    Danh sách Đơn hàng
@endsection
@section('title-chucnang')
    Chức năng quản trị Đơn hàng
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
    <a  href="{{route('backend.donhang.create')}}" class="btn btn-success" id="button">Thêm mới Đơn hàng</a>
    <a  href="{{route('backend.donhang.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Đơn hàng</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Thời gian đặt</th>
        <th>Thời gian nhận</th>
        <th>Người nhận</th>
        <th>Địa chỉ người nhận</th>
        <th>Điện thoại người nhận</th>
        <th>Người gửi</th>
        <th>Lời chúc</th>
        <th>Tình trạng thanh toán</th>
        <th>Nhân viên xử lý</th>
        <th>Ngày xử lý</th>
        <th>Nhân viên giao hàng</th>
        <th>Ngày lập phiếu giao</th>
        <th>Ngày giao hàng</th>
        <th>Trạng thái</th>
        <th>Phương thức vận chuyển</th>
        <th>Phương thức thanh toán</th>
        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($donhang as $dh)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$dh ->dh_ma}}</th>
                <th>{{$dh ->khachHang->kh_hoTen}}</th>
                <th>{{$dh ->dh_thoiGianDatHang}}</th>
                <th>{{$dh ->dh_thoiGianNhanHang}}</th>
                <th>{{$dh ->dh_nguoiNhan}}</th>
                <th>{{$dh ->dh_diaChi}}</th>
                <th>{{$dh ->dh_dienThoai}}</th>
                <th>{{$dh ->dh_nguoiGui}}</th>
                <th>{{$dh ->dh_loiChuc}}</th>
                <th>{{$dh ->dh_daThanhToan == 0 ? "Đã thanh toán":"Chưa thanh toán"}}</th>
                <th>{{$dh ->nhanVienXuLy->nv_hoTen}}</th>
                <th>{{$dh ->dh_ngayXuLy}}</th>
                <th>{{$dh ->nhanVienGiaoHang->nv_hoTen}}</th>
                <th>{{$dh ->dh_ngayLapPhieuGiao}}</th>
                <th>{{$dh ->dh_ngayGiaoHang}}</th>
                <th>{{$dh ->dh_trangThai}}</th>
                <th>{{$dh ->vanChuyen->vc_ten}}</th>
                <th>{{$dh ->thanhToan->tt_ten}}</th>

                <th>
                    <a href="{{route('backend.donhang.edit',['id' =>$dh->dh_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="dh_xoa" action='{{route('backend.donhang.destroy',['id' =>$dh->dh_ma])}}'>
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
