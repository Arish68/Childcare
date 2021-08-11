<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('request_id')->unsigned();
            $table->string('dataType')->nullable();
            $table->boolean('status')->default(0);
            $table->bigInteger('viewer_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('viewer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('rate_notifications');
    }
}
