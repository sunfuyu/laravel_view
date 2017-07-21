<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Validator;
use Hash;
class AdminPost extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::guard('admin')->check();
	}

	/**
	 * 自动以验证规则
	 * 检测原始密码是否正确
	 */
	public function addValidator(){
		Validator::extend('check_pasword', function ($attribute, $value, $parameters, $validator) {
			return Hash::check($value,Auth::guard('admin')->user()->password);
		});
	}
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$this->addValidator();
		return [
			'original_password' => 'sometimes|required|check_pasword',
			'password' => 'sometimes|required|confirmed',
			'password_confirmation' => 'sometimes|required',
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
			'original_password.required' => '原始密码不能为空',
			'original_password.check_pasword' => '原始密码不正确',
			'password.required'  => '新密码不能为空',
			'password.confirmed'  => '确认密码跟新密码不一致',
			'password_confirmation.required'  => '确认密码不能为空',
		];
	}
}
