<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberWorkDonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_work_dones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('job_assign_details_id')->nullable();
            $table->integer('job_assign_operators_id')->nullable();
            $table->enum('performance', ['good','notgood']);
            $table->enum('status', ['downloaded','uploaded']);
            $table->timestamp('download_time')->nullable();
            $table->timestamp('upload_time')->nullable();
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
        Schema::dropIfExists('member_work_dones');
    }
}
