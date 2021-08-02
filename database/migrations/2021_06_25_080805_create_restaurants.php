<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('restaurant_name');
            $table->string('owner_name');
            $table->string('restaurant_logo');
            $table->string('restaurant_address');
            $table->string('city');
            $table->string('lat');
            $table->string('lon');
            $table->string('email');
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('password');
            $table->integer('is_approved')->default(0);
            $table->string('qr_code')->nullable();
            $table->longText('description')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('restaurants');
    }
}
