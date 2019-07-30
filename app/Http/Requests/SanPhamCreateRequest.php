<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sp_ma'=>'required|min:3|max:50|unique:cusc_Sanpham',
            'sp_ten'=>'required|min:3|max:50|unique:cusc_Sanpham',
            'sp_giaGoc'=>'required|min:3|max:10',
            'sp_giaBan'=>'required|min:3|max:10',
            'sp_hinh'=>'required',
            'sp_thongtin'=>'required',
            'sp_danhGia'=>'required|min:3|max:50',

        ];
    }

    public function message(){
        return [

            'sp_ma.required'=>'Mã sản phẩm bắt buộc nhập',
            'sp_ma.min'=>'Mã sản phẩm bắt buộc nhập',
            'sp_ma.max'=>'Mã sản phẩm bắt buộc nhập',
            'sp_ma.unique'=>'Mã sản phẩm đã tồn tại',

            'sp_ten.required'=>'Tên sản phẩm bắt buộc nhập',
            'sp_ten.min'=>'Tên sản phẩm bắt buộc nhập',
            'sp_ten.max'=>'Tên sản phẩm bắt buộc nhập',
            'sp_ten.unique'=>'Tên sản phẩm đã tồn tại',

            'sp_giaGoc.required'=>'Giá gốc sản phẩm bắt buộc nhập',
            'sp_giaGoc.min'=>'Giá gốc sản phẩm bắt buộc nhập',
            'sp_giaGoc.max'=>'Giá gốc sản phẩm bắt buộc nhập',

            'sp_giaBan.required'=>'Giá bán bắt buộc nhập',
            'sp_giaBan.min'=>'Giá bán bắt buộc nhập',
            'sp_giaBan.max'=>'Giá bán bắt buộc nhập',

            'sp_hinh.required'=>'Hình sản phẩm bắt buộc nhập',

            'sp_thongtin.required'=>'Thông tin sản phẩm bắt buộc nhập',

            'sp_danhGia.required'=>'Đánh giá sản phẩm bắt buộc nhập',
            'sp_danhGia.min'=>'Đánh giá sản phẩm bắt buộc nhập',
            'sp_danhGia.max'=>'Đánh giá sản phẩm bắt buộc nhập',
        ];
    }
}
