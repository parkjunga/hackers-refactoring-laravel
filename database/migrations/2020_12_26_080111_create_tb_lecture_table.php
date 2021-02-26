<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lecture', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tb_category');
            $table->string('title',100)->comment('강의명');
            $table->longText('summary')->comment('학습개요');
            $table->mediumInteger('time')->comment('학습시간');
            $table->char('level',2)->comment('학습난이도');
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('tb_file');
            $table->string('teacher',15)->comment('강사')->nullable($value = true);
            $table->unsignedTinyInteger('total_lecture')->comment('강의수');
            $table->unsignedMediumInteger('personnel')->comment('정원');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_lecture');
    }
}
