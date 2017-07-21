<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
			'title' => 'sometimes|required',
			'click' => 'sometimes|integer',
		];
    }

	public function messages()
	{
		return [
			'title.required' => '课程名称不能为空',
			'click.integer' => '点击次数必须为数字',
		];
	}
}
