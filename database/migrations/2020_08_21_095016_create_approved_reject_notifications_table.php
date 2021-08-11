<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedRejectNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_reject_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->unsigned()->integer();
            $table->integer('parent_id')->nullable();
            $table->boolean('status')->nullable();
            $table->string('message')->nullable();
            $table->string('dataType')->nullable();
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
        Schema::dropIfExists('approved_reject_notifications');
    }
}
