<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
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
            'hoTen' => 'required|max:255',
            'gioiTinh' => 'required',
            'ngaySinh' => 'required',
            'thuongTru' => 'max:255',
            'tamTru' => 'max:255',
            'cccd' => 'required|max:12',
            'hocVan' => 'max:255',
            'ngoaiNgu' => 'max:255',
            'stk' => 'max:20',
            'nganHang' => 'max:255',
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
            'hoTen.required' => 'Họ tên không được bỏ trống',
            'hoTen.max' => 'Họ tên không được quá 255 ký tự',
            'gioiTinh.required' => 'Giới tính không được bỏ trống',
            'ngaySinh.required' => 'Ngày sinh không được bỏ trống',
            'thuongTru.max' => 'Thường trú không được quá 255 ký tự',
            'tamTru.max' => 'Tạm trú không được quá 255 ký tự',
            'cccd.required' => 'CCCD không được bỏ trống',
            'hocVan.max' => 'Học vấn không được quá 255 ký tự',
            'ngoaiNgu.max' => 'Ngoại ngữ không được quá 255 ký tự',
            'stk.max' => 'Số tài khoản không được quá 255 ký tự',
            'nganHang,max' => 'Ngân hàng không được quá 255 ký tự'
        ];
    }
}
