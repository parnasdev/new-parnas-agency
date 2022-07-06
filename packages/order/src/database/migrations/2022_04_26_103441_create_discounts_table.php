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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('is_percent')->default(false);
            $table->bigInteger('amount');
            $table->timestamp('expire_date')->nullable();
            $table->integer('use_time')->nullable();
            $table->timestamps();
        });

        Schema::create('discount_user' , function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('discount_id');
            $table->primary(['user_id' , 'discount_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discount_user');
    }
};
