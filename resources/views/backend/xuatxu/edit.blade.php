@extends('backend.layout.master')
@section('title')
    Danh sách Xuất xứ
@endsection
@section('title-chucnang')
    Chức năng quản trị Xuất xứ
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmXuatXu" name="frmXuatXu" method="post" action="{{route('backend.xuatxu.update',['id' =>$xuatxu->xx_ma])}}}">
        @csrf
        <form>
                    <div class="form-group">
                      <label for="xx_ten"> Xuất xứ tên:</label>
                      <input type="text" class="form-control" name="xx_ten" id="xx_ten" aria-describedby="xx_tenHelp" value="{{$xuatxu->xx_ten}}">
                      <small id="xx_tenHelp" class="form-text text-muted">Nhập tên xuất xứ giới hạn 50 ký tự</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmXuatXu").validate({
            rules: {
                xx_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                tt_ten: {
                    required: "Vui lòng nhập tên xuất xứ",
                    minlength: "Tên xuất xứ phải có ít nhất 3 ký tự",
                    maxlength: "Tên xuất xứ không được vượt quá 50 ký tự"
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
