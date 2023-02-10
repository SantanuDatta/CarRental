<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inv_id')->default(1);
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('country')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('post_code')->nullable();
            $table->integer('status')->nullable()->comment('1 = Pending, 2 = Processing, 3 = Success, 4 = Failed, 5 = Canceled');
            $table->text('add_info')->nullable();
            // Payment Gateway Info
            $table->integer('payment_method')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
