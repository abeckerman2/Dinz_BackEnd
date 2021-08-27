<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->integer('table_id')->unsigned()->nullable();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->dateTime('date_time');
            $table->enum('order_status',['order_placed','preparing','garnishing','completed'])->default('order_placed');
            $table->enum('order_type',['placed_order','server_waiter'])->default('placed_order')->comment('If order type is placed_order then order_items table for this id not available. Customization text fillable in case of server waiter.');
            $table->longText('order_text_customization')->nullable();
            $table->enum('sent_payment_type',['online','offline'])->default('online');
            $table->integer('discount_percentage')->default(0)->nullable();
            $table->double('discount_amount')->nullable();
            $table->integer('tax_percentage')->default(0)->nullable();
            $table->double('tax_amount')->nullable();
            $table->double('tip_amount')->nullable();
            $table->double('total_amount')->nullable();

            $table->string('description')->nullable();

            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
