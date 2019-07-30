@extends('backend.layout.master')

@section('title')
Thêm mới Sản phẩm
@endsection

@section('feature-title')
Thêm mới Sản phẩm
@endsection

@section('feature-description')
Thêm mới Sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection
@section('custom-css')
<style>
    .preview-upload {
        border: 1px dashed red;
        padding: 10px;
    }
    .preview-upload img {
        width: 200px;
    }
</style>
@endsection
@section('content')
<!-- Thêm mã hóa để có thể upload file -->
<form id="frmSanPham" name="frmSanPham" method="post" action="{{ route('backend.sanpham.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}">
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá gốc</label>
        <input type="number" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc') }}">
    </div>
    <div class="form-group">
        <label for="sp_giaBan">Giá bán</label>
        <input type="number" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan') }}">
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh">
            <div class="preview-upload">
                <img id='sp_hinh-upload'/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
        <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin') }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
        <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia') }}">
    </div>
    <div class="form-group">
    <select name="sp_trangThai" class="form-control">
        <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        $("#frmSanPham").validate({
            rules: {
                l_ma: {
                    required: true
                },
                sp_ma: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                sp_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 191
                },
                sp_giaGoc: {
                    required: true,
                    minlength: 3,
                    maxlength: 10
                },
                sp_giaBan: {
                    required: true,
                    minlength: 3,
                    maxlength: 10
                },
                sp_hinh: {
                    required: true,
                    minlength: 3,
                    maxlength: 171
                },
                sp_thongTin: {
                    required: true,
                    minlength: 3,
                },
                sp_danhGia: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                l_ma: {
                    required: "Vui lòng nhập loại sản phẩm"
                },
                sp_ma: {
                    required: "Vui lòng nhập Mã sản phẩm",
                    minlength: "Mã sản phẩm phải có ít nhất 3 ký tự",
                    maxlength: "Mã sản phẩm không được vượt quá 50 ký tự"
                },
                sp_ten: {
                    required: "Vui lòng nhập tên sản phẩm",
                    minlength: "Tên sản phẩm phải có ít nhất 3 ký tự",
                    maxlength: "Tên sản phẩm không được vượt quá 50 ký tự"
                },
                sp_giaGoc: {
                    required: "Vui lòng nhập Giá gốc",
                    minlength: "Giá gốc phải có ít nhất 3 ký tự",
                    maxlength: "Giá gốc không được vượt quá 50 ký tự"
                },
                sp_giaBan: {
                    required: "Vui lòng nhập Giá bán",
                    minlength: "Giá bán phải có ít nhất 3 ký tự",
                    maxlength: "Giá bán không được vượt quá 50 ký tự"
                },
                sp_hinh: {
                    required: "Vui lòng nhập Hình",
                    minlength: "Hình phải có ít nhất 3 ký tự",
                    maxlength: "Hình không được vượt quá 50 ký tự"
                },
                sp_thongTin: {
                    required: "Vui lòng nhập Thông tin",
                    minlength: "Thông tin phải có ít nhất 3 ký tự",
                    maxlength: "Thông tin không được vượt quá 50 ký tự"
                },
                sp_danhGia: {
                    required: "Vui lòng nhập Đánh giá",
                    minlength: "Đánh giá phải có ít nhất 3 ký tự",
                    maxlength: "Đánh giá không được vượt quá 50 ký tự"
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

// Đọc hình ảnh khi người dùng nhập và
<script>
        // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
        function readURL(input) {
            debugger;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#sp_hinh-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
        $("#sp_hinh").change(function(){
            readURL(this);
        });
    </script>
@endsection
