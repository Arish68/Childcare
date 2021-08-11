<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('request_id')->nullable();
             $table->string('dataType')->nullable();
            $table->boolean('status')->default(0)->nullable();
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
        Schema::dropIfExists('parent_notifications');
    }
}
