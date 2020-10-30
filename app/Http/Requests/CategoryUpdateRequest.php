<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
		'name' => 'required',
	];
}
public function messages()
{
	return [
		'name.required' => 'Tên sản phẩm bắt buộc phải có',
	];
}
}
