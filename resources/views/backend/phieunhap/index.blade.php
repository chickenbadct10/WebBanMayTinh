@extends('backend.layout.master')
@section('title')
    Danh sách Phiếu nhập
@endsection
@section('title-chucnang')
    Chức năng quản trị Phiếu nhập
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
    <a  href="{{route('backend.phieunhap.create')}}" class="btn btn-success" id="button">Thêm mới Phiếu nhập</a>
    <a  href="{{route('backend.phieunhap.pdf')}}" class="btn btn-danger" id="button">Xuất pdf Phiếu nhập</a>

    <br/>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên người giao</th>
        <th>Số hóa đơn</th>
        <th>Ngày xuất</th>
        <th>Ghi chú</th>
        <th>Tên người lập phiếu</th>
        <th>Ngày lập phiếu</th>
        <th>Tên Kế toán</th>
        <th>Ngày xác nhận</th>
        <th>Tên Thủ kho</th>
        <th>Ngày Nhập kho</th>
        <th>Trạng thái</th>
        <th>Tên nhà cung cấp</th>

        <th>Sửa </th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($phieunhap as $pn)
            <tr>
                <th>{{$loop->index + 1}}</th>
                <th>{{$pn->pn_nguoigiao}}</th>
                <th>{{$pn->pn_soHoaDon}}</th>
                <th>{{$pn->pn_ngayXuatHoaDon}}</th>
                <th>{{$pn->pn_ghiChu}}</th>
                <th>{{$pn-> nhanVienNhap->nv_hoTen}}</th>
                <th>{{$pn->pn_ngayLapPhieu}}</th>
                <th>{{$pn-> nhanVienKeToan->nv_hoTen}}</th>
                <th>{{$pn->pn_ngayXacNhan}}</th>
                <th>{{$pn-> nhanVienThuKho->cd_ten}}</th>
                <th>{{$pn->pn_ngayNhapKho}}</th>
                <th>{{$pn-> pn_trangThai}}</th>
                <th>{{$pn->nhaCungCap->ncc_ten}}</th>
                <th>
                    <a href="{{route('backend.phieunhap.edit',['id' =>$pn->pn_ma])}}" class="btn btn-primary">Sửa</a>
                </th>
                <th>
                        <form method="post" id="gopy_xoa" action='{{route('backend.phieunhap.destroy',['id' =>$pn->pn_ma])}}'>
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
