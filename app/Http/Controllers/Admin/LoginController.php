<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
/**
 * 后台登录管理控制器
 * Class LoginController
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
	//加载登录页面
	public function index()
	{
		return view('admin.login.index');
	}
	//处理登录
	public function login(Request $request)
	{
		//处理登录
		$status = Auth::guard('admin')->attempt([
			'name' => $request->input('name'),
			'password' => $request->input('password')
		]);
		if($status)
		{
			return redirect('admin/index');
		}
		return redirect('/admin/login')->with('error','用户名或是密码不正确');
	}
}
