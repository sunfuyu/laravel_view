<?php

namespace App\Http\Controllers\Api;

use App\Model\Lesson;
use App\Model\Tag;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ContentController extends CommonController
{

	/**
	 * 获取热门课程数据
	 * @param null $row
	 *
	 * @return array
	 */
	public function hotLesson( $row=null){
		if($row){
			//获取制定条数数据
			$data = Lesson::where('ishot',1)->limit($row)->get();
		}else{
			//返回全部人们数据
			$data = Lesson::where('ishot',1)->get();
		}
		return $this->responce($data);
	}
	/**
	 * 获取推荐课程数据
	 * @param null $row
	 *
	 * @return array
	 */
	public function commendLesson( $row=null){
		if($row){
			//获取制定条数数据
			$data = Lesson::where('iscommend',1)->limit($row)->get();
		}else{
			//返回全部人们数据
			$data = Lesson::where('iscommend',1)->get();
		}
		return $this->responce($data);
	}

	/**
	 * 获取标签数据
	 * @return array
	 */
	public function tags(){
		$data = Tag::get();
		return $this->responce($data);
	}

	/**
	 * 获取video页面的课程数据
	 * @param $tid
	 *
	 * @return array
	 */
	public function lesson( $tid = null){
		if($tid){
			//获取当前tid下面数据
			$data = DB::table('lessons')
				->join('tag_lessons', 'lessons.id', '=', 'tag_lessons.lesson_id')
				->where('tag_lessons.tid',$tid)
				->select('lessons.*')
				->get();
		}else{
			//获取全部课程数据
			$data = DB::table('lessons')->get();
		}
		return $this->responce($data);
	}

	/**
	 * 获取视频列表数据
	 * @param $lessonId
	 *
	 * @return array
	 */
	public function videos( $lessonId){
		$data = Video::where('lesson_id',$lessonId)->get();
		return $this->responce($data);
	}
}
