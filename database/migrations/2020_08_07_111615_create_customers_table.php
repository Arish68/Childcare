<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->char('type',1);
            $table->char('premium',0);
            $table->string('password');
            $table->string('phone_no');
            $table->string('admin_approved')->nullable();
            $table->string('subscription_status')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('subscription_valid')->nullable();
            $table->integer('subscription_month')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->string('verificaitonCode')->nullable();
            $table->text('device_token')->nullable();
            $table->string('stripe_id')->nullable()->index();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
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
        Schema::dropIfExists('customers');

    }
}
