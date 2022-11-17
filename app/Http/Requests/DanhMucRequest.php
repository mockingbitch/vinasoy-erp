<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
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
            'tenDanhMuc' => 'required|max:50',
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
            'tenDanhMuc.required' => 'Tên danh mục không được bỏ trống',
            'tenDanhMuc.max' => 'Tên danh mục không được vượt quá 50 ký tự',
        ];
    }
}
