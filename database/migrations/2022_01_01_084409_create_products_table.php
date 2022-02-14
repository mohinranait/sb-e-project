<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('sortDiscription');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('quentity')->default(5);
            $table->integer('regular_price');
            $table->text('description')->nullable();
            $table->integer('offer_price')->nullable();
            $table->integer('is_fiture')->default(0)->comment('0=In-active , 1=Active');
            $table->integer('status')->default(1)->comment('1=active, 2=In-active');
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
