<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminMeetupCommentNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        
     Schema::create('admin_meetup_comment_notification', function (Blueprint $table) {
            $table->id();
           // $table->integer('parant_id')->unsigned()->index();
            $table->integer('meetup_id')->unsigned()->index();
            $table->string('meetup_title');
            $table->string('message')->default('You have new Comment from Admin.');
            
          //  $table->string('statys');
           // $table->text('remarks');
            //$table->text('supplies_1');
            //$table->text('descriptin');
            $table->integer('status')->default('0')->comment('0 = read, 1 = unread');
           // $table->integer('teacher_show');
           // $table->integer('parant_show');
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
            Schema::dropIfExists('admin_meetup_comment_notification');
    }
}
