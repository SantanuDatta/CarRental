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
        Schema::create('protections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id');
            $table->unsignedInteger('collision_damage_waiver');
            $table->unsignedInteger('theft_protection');
            $table->unsignedInteger('rental_contact_fee');
            $table->unsignedInteger('personal_first_aid_service');
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
        Schema::dropIfExists('protections');
    }
};
