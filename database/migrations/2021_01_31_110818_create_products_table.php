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
            $table->string('product_name',2000);
            $table->foreignId('seller_id')->constrained('sellers');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('tag_id')->constrained('tags');
            $table->text('description');
            $table->double('qnt');
            $table->double('price');
            $table->double('compare_price');
            $table->string('product_img',500);
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
