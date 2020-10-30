<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInsertRequest extends FormRequest
{
	/**
	* @return bool
	*/
	public function authorize()
	{
		return true;
	}
	
	/**
    * @return array
	*/
public function rules()
{
	return [
		'name' => 'required|unique:products',
		'category' => 'required',
	];
}
public function messages()
{
	return [
		'name.required' => 'Tên sản phẩm bắt buộc phải có',
		'name.unique' => 'Tên sản phẩm đã tồn tại',
		'category.required' =>'Bạn chưa chọn loại sản phẩm'
	];
}
}
