<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddartworkNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        
        
        Schema::create('addartworknotifications', function (Blueprint $table) {
            $table->id();
            $table->integer('parant_id')->unsigned()->index();
            $table->integer('teacher_id')->unsigned()->index();
            $table->integer('lesson_id')->default('0');
            $table->integer('art_id')->default('0');
            $table->string('message')->default('You have new Art/Work.');
          //  $table->string('statys');
           // $table->text('remarks');
            //$table->text('supplies_1');
            //$table->text('descriptin');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('addartworknotifications');
    }
}
