<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LessonCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('lesson_cetogires', function (Blueprint $table) {
            $table->id();
           // $table->integer('customer_id')->unsigned()->index();
            //$table->integer('request_id')->unsigned()->index();
            //$table->integer('category_id');
            $table->string('title');
            //$table->string('image');
            $table->text('purpose');
            //$table->text('supplies_1');
            $table->text('descriptin');
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
         Schema::dropIfExists('lesson_cetogires');
    }
}
