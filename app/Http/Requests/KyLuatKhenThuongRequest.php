<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KyLuatKhenThuongRequest extends FormRequest
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
            'hinhThuc' => 'max:50',
            'soQuyetDinh' => 'max:50',
            'lyDo' => 'required',
            'mucPhat' => 'nullable|numeric',
            'mucThuong' => 'nullable|numeric'
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
            'hinhThuc.max' => 'Hình thức không được vượt quá 50 ký tự',
            'soQuyetDinh.max' => 'Số quyết định không được vượt quá 50 ký tự',
            'lyDo.required' => 'Lý do không được bỏ trống',
            'mucPhat.numeric' => 'Mức phạt phải là kiểu số',
            'mucThuong.numeric' => 'Mức thưởng phải là kiểu số'
        ];
    }
}
