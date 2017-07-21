<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
			'name' => 'sometimes|required',
		];
	}
	/**
	 * 获取已定义验证规则的错误消息。
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => '请填写标签名称',
		];
	}
}
