@extends('backend.layout.master')
@section('title')
    Danh sách phương thức Thanh toán
@endsection
@section('title-chucnang')
    Chức năng quản trị phương thức Thanh toán
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmThanhToan" name="frmThanhToan" method="post" action="{{route('backend.thanhtoan.update',['id' =>$thanhtoan->tt_ma])}}}">
        @csrf
        <form>
                <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                      <label for="tt_ten"> Thanh toán tên:</label>
                      <input type="text" class="form-control" name="tt_ten" id="tt_ten" aria-describedby="tt_tenHelp" value="{{$thanhtoan->tt_ten}}">
                      <small id="tt_tenHelp" class="form-text text-muted">Nhập tên Thanh toán giới hạn 50 ký tự</small>
                      <label for="tt_dienGiai"> Diễn giải:</label>
                      <input type="text" class="form-control" name="tt_dienGiai" id="tt_dienGiai" aria-describedby="tt_dienGiaiHelp" value="{{$thanhtoan->tt_dienGiai}}">
                      <small id="tt_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải giới hạn 50 ký tự</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmThanhToan").validate({
            rules: {
                tt_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                tt_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                tt_ten: {
                    required: "Vui lòng nhập tên phương thức thanh toán",
                    minlength: "Tên phương thức thanh toán phải có ít nhất 3 ký tự",
                    maxlength: "Tên phương thức thanh toán không được vượt quá 50 ký tự"
                },
                tt_dienGiai: {
                    required: "Vui lòng nhập diễn giải",
                    minlength: "Tên diễn giải phải có ít nhất 3 ký tự",
                    maxlength: "Tên diễn giải không được vượt quá 50 ký tự"
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
