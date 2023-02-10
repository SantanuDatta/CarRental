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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('rent_price')->nullable();
            $table->integer('car_quantity')->default(1);
            $table->string('pick_up')->nullable();
            $table->string('drop_off')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('pick_time')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_time')->nullable();
            $table->string('days')->nullable();
            $table->string('additional_driver')->nullable();
            $table->string('gps')->nullable();
            $table->string('bicycle_rack')->nullable();
            $table->string('music')->nullable();
            $table->string('collision_damage_waiver')->nullable();
            $table->string('theft_protection')->nullable();
            $table->string('rental_contact_fee')->nullable();
            $table->string('personal_first_aid_service')->nullable();
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
        Schema::dropIfExists('carts');
    }
};
