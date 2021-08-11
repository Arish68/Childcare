<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lessonartworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        
        Schema::create('lessonartworks', function (Blueprint $table) {
            $table->id();
            $table->integer('parant_id')->unsigned()->index();
            $table->integer('teacher_id')->unsigned()->index();
            $table->integer('lesson_id');
            $table->string('parant_title')->nullable();
            $table->string('image')->nullable();
            $table->text('remarks');
            //$table->text('supplies_1');
            //$table->text('descriptin');
            $table->integer('status');
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
        Schema::dropIfExists('lessonartworks');
    }
}
