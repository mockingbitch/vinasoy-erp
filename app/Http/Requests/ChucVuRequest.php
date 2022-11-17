<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChucVuRequest extends FormRequest
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
            'tenChucVu' => 'required|max:255',
            'ghiChu' => 'max:255',
            'trangThai' => 'required|max:2',
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
            'tenChucVu.required' => 'Chức vụ không được bỏ trống',
            'tenChucVu.max' => 'Chức vụ không được quá 255 ký tự',
            'ghiChu.max' => 'Ghi chú không được quá 255 ký tự',
            'trangThai.required' => 'Trạng thái không được bỏ trống',
            'trangThai.max' => 'Trạng thái không được quá 2 ký tự',
        ];
    }
}
