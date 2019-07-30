<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuDeCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cd_ten' => 'required|min:3|max:50|unique:cusc_chude',

        ];
    }

    public function messages(){
        return [
            'cd_ten.required'=>'Tên chủ đề bắt buộc nhập',
            'cd_ten.min'=>'Tên chủ đề bắt buộc nhập',
            'cd_ten.max'=>'Tên chủ đề bắt buộc nhập',
            'cd_ten.unique'=>'Tên chủ đề đã tồn tại'
        ];
    }
}
