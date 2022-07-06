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
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('guest_key')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('schedule_id')->nullable();
            $table->foreignId('discount_id')->nullable();
            $table->bigInteger('transfer_price')->nullable();
            $table->bigInteger('discount_price')->nullable();
            $table->foreignId('transfer_id')->nullable();
            $table->bigInteger('tax')->nullable();
            $table->bigInteger('total_price')->nullable();
            $table->json('attachment')->nullable();
            $table->string('payment_type');
            $table->string('type'); // factor , cart
            $table->foreignId('status_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
