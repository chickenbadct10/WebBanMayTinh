@extends('backend.layout.master')
@section('title')
    Danh sách phương thức Vận chuyển
@endsection
@section('title-chucnang')
    Chức năng quản trị phương thức Vận chuyển
@endsection
@section('feature-description')
Xem nhanh toàn hệ thống
@endsection
@section('content')
<form id="frmVanChuyen" name="frmVanChuyen" method="post" action="{{route('backend.vanchuyen.update',['id' =>$vanchuyen->vc_ma])}}}">
        @csrf
        <form>
                <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                      <label for="vc_ten"> Vận chuyển tên:</label>
                      <input type="text" class="form-control" name="vc_ten" id="vc_ten" aria-describedby="vc_tenHelp" value="{{$vanchuyen->vc_ten}}">
                      <small id="vc_tenHelp" class="form-text text-muted">Nhập tên Loại giới hạn 50 ký tự</small>
                      <label for="vc_chiPhi"> Chi phí:</label>
                      <input type="number" class="form-control" name="vc_chiPhi" id="vc_chiPhi" aria-describedby="vc_chiPhiHelp" value="{{$vanchuyen->vc_chiPhi}}">
                      <small id="vc_chiPhiHelp" class="form-text text-muted">Nhập chi phí vận chuyển bằng số</small>
                      <label for="vc_dienGiai"> Diễn giải:</label>
                      <input type="text" class="form-control" name="vc_dienGiai" id="vc_dienGiai" aria-describedby="vc_dienGiaiHelp" value="{{$vanchuyen->vc_dienGiai}}">
                      <small id="vc_dienGiaiHelp" class="form-text text-muted">Nhập diễn giải giới hạn 50 ký tự</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmVanChuyen").validate({
            rules: {
                vc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                vc_chiPhi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                vc_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                vc_ten: {
                    required: "Vui lòng nhập tên Vận chuyển",
                    minlength: "Tên Vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Tên Vận chuyển không được vượt quá 50 ký tự"
                },
                vc_chiPhi: {
                    required: "Vui lòng nhập chi phí vận chuyển",
                    minlength: "Chi phí vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Chi phí vận chuyển không được vượt quá 50 ký tự"
                },
                vc_dienGiai: {
                    required: "Vui lòng nhập diễn giải",
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
