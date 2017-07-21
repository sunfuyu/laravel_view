<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->string('title',100);//课程标题
			$table->string('introduce',100);//介绍
			$table->tinyInteger('ishot');//是否热门
			$table->tinyInteger('iscommend');//是否推荐
			$table->string('preview');//预览图
			$table->integer('click');//点击量
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
