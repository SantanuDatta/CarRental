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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedInteger('rent')->default(1);
            $table->text('features')->nullable();
            $table->text('image')->nullable();
            $table->integer('status')->default(0)->comment('0 = Not Available, 1 = Available');
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
        Schema::dropIfExists('cars');
    }
};
