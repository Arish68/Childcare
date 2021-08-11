<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->bigInteger('stars')->default(0);
            $table->foreign('teacher_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('customers')->onDelete('cascade');
            $table->text('reviews')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
