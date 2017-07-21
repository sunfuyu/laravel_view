<?php

namespace App\Http\Controllers\Component;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	public function uploader(Request $request)
	{
		$upload = $request->file;
		//上传判断
		if ( $upload->isValid() ) {
			$path = $upload->store( date( 'ymd' ) , 'attachment' );
			return [ 'valid' => 1, 'message' => asset('attachment/' . $path) ];
		}
		return [ 'vaild' => 0 , 'message' => '上传失败' ];

	}
	//获取文件列表
	public function filesLists() {

		return [ 'data' => '', 'page' => '' ] ;
	}
}
