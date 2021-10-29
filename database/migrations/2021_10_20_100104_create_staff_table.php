<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->integer('stafftype_id');
            // $table->string('mota');
            $table->string('ngaysinh');
            // $table->string('date_start');
            // $table->string('date_end');
            $table->string('hinhanh');
            $table->string('diachi');
            // $table->string('category');
            $table->string('kichhoat');
            $table->string('sodienthoai');
            // $table->integer('dichvu_id');
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
        Schema::dropIfExists('staff');
    }
}
