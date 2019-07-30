@extends('backend.layout.master')
@section('title')
    Danh sách loại
@endsection
@section('title-chucnang')
    Chức năng quản trị Loại
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{route('backend.loai.store')}}">
    @csrf
    <form>
            <div class="form-group">
              <label for="l_ten"> Loại tên:</label>
              <input type="text" class="form-control" name="l_ten" id="l_ten" aria-describedby="l_tenHelp" placeholder="Nhập tên chủ đề">
              <small id="l_tenHelp" class="form-text text-muted">Nhập tên loại giới hạn 50 ký tự</small>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a type="button" href="{{route('backend.loai.index')}}" class="btn btn-warning">Trở về</a>

    </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                l_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                l_ten: {
                    required: "Vui lòng nhập tên Loại",
                    minlength: "Tên Loại phải có ít nhất 3 ký tự",
                    maxlength: "Tên Loại không được vượt quá 50 ký tự"
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
