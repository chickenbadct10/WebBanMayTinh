@extends('backend.layout.master')
@section('title')
    Danh sách khách hàng
@endsection
@section('title-chucnang')
    Chức năng quản trị Khách hàng
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmKhachHang" name="frmKhachHang" method="post" action="{{route('backend.khachhang.store')}}">
        @csrf
        <form>
                <div class="form-group">
                    <label for="kh_taiKhoan"> Tài khoản:</label>
                    <input type="text" maxlength="20" class="form-control" name="kh_taiKhoan" id="kh_taiKhoan" aria-describedby="kh_taiKhoanHelp" placeholder="Nhập tài khoản khách hàng">
                    <small id="kh_taiKhoanHelp" class="form-text text-muted">Nhập tên tài khoản giới hạn 20 ký tự</small>
                </div>
                <div class="form-group">
                    <label for="kh_matKhau"> mật khẩu:</label>
                    <input type="text" class="form-control"  maxlength="20"  name="kh_matKhau" id="kh_matKhau" aria-describedby="kh_matKhauHelp" placeholder="Nhập mật khẩu khách hàng">
                    <small id="kh_matKhauHelp" class="form-text text-muted">Nhập mật khẩu giới hạn 20 ký tự</small>
                </div>
                <div class="form-group">
                  <label for="kh_hoTen"> Họ và tên:</label>
                  <input type="text" class="form-control" maxlength="50" name="kh_hoTen" id="kh_hoTen" aria-describedby="kh_hoTenHelp" placeholder="Nhập tên khách hàng">
                  <small id="kh_hoTenHelp" class="form-text text-muted">Nhập họ tên khách hàng giới hạn 50 ký tự</small>
                </div>
                <div class="form-group">
                    <label for="kh_gioiTinh"> Giới tính:</label>
                    <br/>
                <label class="btn btn-light">
                    <input type="radio" name="kh_gioiTinh" id="kh_gioiTinh" value="1"> Nam
                  </label>
                  <label class="btn btn-light">
                    <input type="radio" name="kh_gioiTinh" id="kh_gioiTinh" value="0"> Nữ
                  </label>
                  <small id="kh_gioiTinhHelp" class="form-text text-muted">Chọn giới tính khách hàng</small>
                </div>
                <div class="form-group">
                    <label for="kh_email"> Email:</label>
                    <input type="email" class="form-control" name="kh_email" id="kh_email" aria-describedby="kh_emailHelp" placeholder="Nhập email">
                    <small id="kh_emailHelp" class="form-text text-muted">Nhập email khách hàng</small>
                </div>
                <div class="form-group">
                    <label for="kh_ngaySinh">Ngày sinh:</label>
                    <input type="text" class="form-control" name="kh_ngaySinh" id="kh_ngaySinh" aria-describedby="kh_ngaySinhHelp" placeholder="Nhập ngày sinh khách hàng">
                    <small id="kh_ngaySinhHelp" class="form-text text-muted">Nhập ngày sinh</small>
                </div>
                <div class="form-group">
                        <label for="kh_diaChi">Địa chỉ:</label>
                        <input type="text" class="form-control" name="kh_diaChi" id="kh_diaChi" aria-describedby="kh_diaChiHelp" placeholder="Nhập địa chỉ khách hàng">
                        <small id="kh_diaChiHelp" class="form-text text-muted">Nhập địa chỉ</small>
                </div>
                <div class="form-group">
                        <label for="kh_dienThoai">Điện thoại:</label>
                        <input type="text" class="form-control" name="kh_dienThoai" id="kh_dienThoai" aria-describedby="kh_dienThoaiHelp" placeholder="Nhập số điện thoại khách hàng">
                        <small id="kh_dienThoaiHelp" class="form-text text-muted">Nhập số điện thoại</small>
                </div>
                <div class="form-group">
                <select name="kh_trangThai" class="form-control">
                        <option value="1" {{ old('kh_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
                        <option value="2" {{ old('kh_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
                        <option value="3" {{ old('kh_trangThai') == 3 ? "selected" : "" }}>Chưa kích hoạt</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a type="button" href="{{route('backend.khachhang.index')}}" class="btn btn-primary">Trở về</a>

        </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmKhachHang").validate({
            rules: {
                kh_taiKhoan: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_matKhau: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_hoTen: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_email: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_ngaySinh: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_diaChi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_dienThoai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                kh_taiKhoan: {
                    required: "Vui lòng nhập tên tài khoản",
                    minlength: "Tên tài khoản phải có ít nhất 3 ký tự",
                    maxlength: "Tên tài khoản không được vượt quá 50 ký tự"
                },
                kh_matKhau: {
                    required: "Vui lòng nhập Mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 3 ký tự",
                    maxlength: "Mật khẩu không được vượt quá 50 ký tự"
                },
                kh_hoTen: {
                    required: "Vui lòng nhập Họ và tên",
                    minlength: "Họ và tên phải có ít nhất 3 ký tự",
                    maxlength: "Họ và tên không được vượt quá 50 ký tự"
                },
                kh_email: {
                    required: "Vui lòng nhập tên email",
                    minlength: "Email phải có ít nhất 3 ký tự",
                    maxlength: "Email không được vượt quá 50 ký tự"
                },
                kh_ngaySinh: {
                    required: "Vui lòng nhập Ngày sinh",
                    minlength: "Ngày sinh phải có ít nhất 3 ký tự",
                    maxlength: "Ngày sinh không được vượt quá 50 ký tự"
                },
                kh_diaChi: {
                    required: "Vui lòng nhập Địa chỉ",
                    minlength: "Địa chỉ phải có ít nhất 3 ký tự",
                    maxlength: "Địa chỉ không được vượt quá 50 ký tự"
                },
                kh_dienThoai: {
                    required: "Vui lòng nhập Điện thoại",
                    minlength: "Điện thoại phải có ít nhất 3 ký tự",
                    maxlength: "Điện thoại không được vượt quá 50 ký tự"
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection
