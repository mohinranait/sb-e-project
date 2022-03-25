<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('cuntry')->nullable();
            $table->string('post_code')->nullable();
            $table->text('message')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->integer('is_paid')->default(0)->comment('0=COD');
            $table->integer('status')->default(1)->comment('1=prossecion ,2=hold , 3=success , 4=cancle');
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
}
