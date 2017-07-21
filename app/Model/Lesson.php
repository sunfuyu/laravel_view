<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	protected $guarded = [];

	/**
	 * 一对多关联，课程跟视频
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function videos ()
	{
		return $this->hasMany( Video::class );
	}
}
