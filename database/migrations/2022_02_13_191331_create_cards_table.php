<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_qty')->default(1);
            $table->unsignedInteger('order_id')->nullable();
            $table->string('unite_price')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

           // $table->foreign('user_id')->refference('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
