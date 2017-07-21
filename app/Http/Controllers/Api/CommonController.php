<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{

	/**
	 * 返回错误码信息和数据
	 * @param $data
	 * @param int $code
	 *
	 * @return array
	 */
	public function responce ( $data , $code = 200 )
	{

		return [ 'code' => $code , 'data' => $data ];
	}
}
