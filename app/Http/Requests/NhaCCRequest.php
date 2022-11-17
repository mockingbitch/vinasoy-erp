<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCCRequest extends FormRequest
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
            'tenNhaCC' => 'required|max:50',
            'maSoThue' => 'nullable|max:50',
            'sdt' => 'required',
            'email' => 'email',
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
            'tenNhaCC.required' => 'Tên nhà cung cấp không được bỏ trống',
            'tenNhaCC.max' => 'Tên nhà cung cấp không được vượt quá 50 ký tự',
            'maSoThue.max' => 'Mã số thuế không được vượt quá 50 ký tự',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'email.email' => 'Vui lòng nhập đúng định dạng email'
        ];
    }
}
