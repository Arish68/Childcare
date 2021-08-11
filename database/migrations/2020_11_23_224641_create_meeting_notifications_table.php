<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('meeting_id')->nullable();
            $table->integer('commenter_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('meeting_notifications');
    }
}
