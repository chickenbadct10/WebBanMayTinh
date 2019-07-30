@extends('backend.layout.master')
@section('title')
    Danh sách Quyền
@endsection
@section('title-chucnang')
    Chức năng quản Quyền
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmQuyen" name="frmQuyen" method="post" action="{{route('backend.quyen.store')}}">
    @csrf
    <form>
            <div class="form-group">
              <label for="q_ten"> Quyền tên:</label>
              <input type="text" class="form-control" name="q_ten" id="q_ten" aria-describedby="q_tenHelp" placeholder="Nhập tên quyền">
              <small id="q_tenHelp" class="form-text text-muted">Nhập tên quyền giới hạn 50 ký tự</small>
              <label for="q_dienGiai"> Diễn giải:</label>
              <input type="text" class="form-control" name="q_dienGiai" id="q_dienGiai" aria-describedby="q_dienGiaiHelp" placeholder="Nhập diễn giải quyền">
              <small id="q_dienGiaiHelp" class="form-text text-muted">Nhập tên diễn giải giới hạn 50 ký tự</small>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a type="button" href="{{route('backend.quyen.index')}}" class="btn btn-warning">Trở về</a>

    </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmQuyen").validate({
            rules: {
                q_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                q_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                l_ten: {
                    required: "Vui lòng nhập tên Quyền",
                    minlength: "Tên Quyền phải có ít nhất 3 ký tự",
                    maxlength: "Tên Quyền không được vượt quá 50 ký tự"
                },
                q_dienGiai: {
                    required: "Vui lòng nhập Diễn giải",
                    minlength: "Diễn giải phải có ít nhất 3 ký tự",
                    maxlength: "Diễn giải không được vượt quá 50 ký tự"
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
