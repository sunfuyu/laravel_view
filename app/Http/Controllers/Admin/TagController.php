<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Model\Tag as TagModel;

class TagController extends CommonController
{

	/**
	 * 首页列表数据
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index ()
	{
		$field = TagModel::paginate( 10 );

		//dd($field);
		return view( 'admin.tag.index' , compact( 'field' ) );
	}

	/**
	 * 添加视图页面
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create ()
	{
		return view( 'admin.tag.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store ( TagRequest $request , TagModel $tag )
	{
		//dd($request->all());//打印所有数据
		$tag->create( $request->all() );

		return redirect( '/admin/tag' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show ( $id )
	{
		echo 'show';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit ( $id )
	{
		//获取旧数据
		$model = TagModel::find( $id );
		//dd($model);
		return view( 'admin.tag.edit' , compact( 'model' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update ( Request $request , $id )
	{
		//dd($id);
		//执行更新
		$model = TagModel::find( $id );
		//$model->name = $request->input('name');
		$model->name = $request[ 'name' ];
		$model->save();

		$field = TagModel::paginate( 10 );

		//dd($field);
		return view( 'admin.tag.index' , compact( 'field' ) );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ( $id )
	{
		//dd($id);
		TagModel::destroy( $id );

		return $this->success( '删除成功' );
		//return response()->json( [ 'valid' => 1 , 'message' => '删除成功' ] );
		//return json_encode(['valid'=>1,'message'=>'删除成功']);
	}
}
