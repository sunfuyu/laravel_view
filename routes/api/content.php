<?php

Route::group(['namespace'=>'Api'],function(){
	//热门视频
	Route::get('/hotLesson/{row?}','ContentController@hotLesson');
	//推荐
	Route::get('/commendLesson/{row?}','ContentController@commendLesson');
	//获取标签
	Route::get('/tags','ContentController@tags');
	//列表页课程数据
	Route::get('/lesson/{tid?}','ContentController@lesson');
	//视频列表数据
	Route::get('/videos/{lessonId}','ContentController@videos');

});