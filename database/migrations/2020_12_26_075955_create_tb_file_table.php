<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_file', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->comment('파일명');
            $table->string('ori_name',100)->comment('원본파일명');
            $table->char('type',5)->comment('확장자');
            $table->string('path',100)->comment('경로');
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
        Schema::dropIfExists('tb_file');
    }
}
