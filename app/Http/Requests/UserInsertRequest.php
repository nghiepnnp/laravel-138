<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsertRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Tên sản phẩm bắt buộc phải có',
            'name.unique' => 'Email đã được sử dụng',
            'phone.required' =>'Bạn chưa nhập số điện thoại',
            'phone.unique' =>'Số điện thoai đã được sử dụng',
        ];
    }
}
