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
            'gioiTinh' => 'required|numeric',
            'ngaySinh' => 'required',
            'thuongTru' => 'max:255',
            'tamTru' => 'max:255',
            'cccd' => 'required|numeric',
            'hocVan' => 'max:255',
            'ngoaiNgu' => 'max:255',
            'stk' => 'numeric',
            'nganHang' => 'max:255',
            'email' => 'required|email|max:50',
            'password' => 'required',
            're-password' => 'required',
            'role' => 'required|numeric'
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
            'gioiTinh.numeric' => 'Sai kiểu dữ liệu giới tính',
            'ngaySinh.required' => 'Ngày sinh không được bỏ trống',
            'thuongTru.max' => 'Thường trú không được quá 255 ký tự',
            'tamTru.max' => 'Tạm trú không được quá 255 ký tự',
            'cccd.required' => 'CCCD không được bỏ trống',
            'cccd.numeric' => 'Số CCCD phải là kiểu số',
            'cccd.max' => 'Số CCCD không được vượt quá 13 ký tự',
            'hocVan.max' => 'Học vấn không được quá 255 ký tự',
            'ngoaiNgu.max' => 'Ngoại ngữ không được quá 255 ký tự',
            // 'stk.max' => 'Số tài khoản không được quá 255 ký tự',
            'stk.numeric' => 'Số tài khoản phải là kiểu số',
            'nganHang.max' => 'Ngân hàng không được quá 255 ký tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Vui lòng nhập định dạng email',
            'email.max' => 'Email không được vượt quá 50 ký tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            're-password.required' => 'Xác nhận mật khẩu',
            'role.required' => 'Vai trò không được bỏ trống',
            'role.numeric' => 'Sai kiểu dữ liệu vai trò'
        ];
    }
}
