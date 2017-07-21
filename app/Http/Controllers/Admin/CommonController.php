<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CommonController
 * @package App\Http\Controllers\Admin
 */
class CommonController extends Controller
{

	/**
	 * 构造方法，执行登录验证
	 * CommonController constructor.
	 */
	public function __construct ()
	{
		$this->middleware('admin.auth');
	}

	/**
	 * 成功提示消息，ajax
	 * @param $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function success( $message){
		return response()->json( [ 'valid' => 1 , 'message' => $message ] );
	}

	/**
	 * 失败消息
	 * @param $message
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function error( $message){
		return response()->json( [ 'valid' => 0 , 'message' => $message ] );


	}
}
