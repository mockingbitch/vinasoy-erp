<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tenSP' => 'required',
            'donGia' => 'required|numeric|min:1',
            'img' => 'image',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'tenSP.required' => 'Tên sản phẩm không được bỏ trống',
            'donGia.required' => 'Đơn giá không được bỏ trống',
            'donGia.numeric' => 'Đơn giá phải là kiểu số',
            'donGia.min' => 'Vui lòng nhập giá lớn hơn 1',
            'img.image' => 'File tải lên phải là hình ảnh'
        ];
    }
}
