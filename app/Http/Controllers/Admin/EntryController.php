<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin.auth');
	}

	public function index()
	{
		return view('admin.entry.index');
	}

	public function pass()
	{
		return view('admin.entry.pass');
	}

	/**
	 * 修改密码
	 * @param AdminPost $request
	 */
	public function changePass(AdminPost $request)
	{
		$model = Auth::guard('admin')->user();
		$model->password = bcrypt($request->input('password'));
		$model->save();
		flash()->overlay('密码修改成功', '温馨提示');
		return redirect()->back();
	}
}
