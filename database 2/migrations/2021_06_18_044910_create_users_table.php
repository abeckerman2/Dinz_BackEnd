<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->string('image')->nullable();
            $table->enum('device_type',['None','Ios','Android'])->default('None');
            $table->text('device_token')->nullable();
            $table->longText('reset_password_token')->nullable();
            $table->longtext('verify_email_token')->nullable();
            $table->string('is_block')->default(0)->comment("0 => Unblocked 1 => Blocked");
            $table->string('is_verify')->default(0)->comment("0 => Not Verify, 1 => Verify");
            $table->string('refresh_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
