<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name',100);
            $table->string('store_name',100);
            $table->foreignId('activity_id')->constrained('activities');
            $table->string('email',100)->unique();
            $table->text('store_address');
            $table->string('city');
            $table->foreignId('country_id')->constrained('countries');
            $table->integer('zip_code');
            $table->integer('store_contact');
            $table->text('store-desc');
            $table->text('store_policy');
            $table->string('store_img',100);
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
        Schema::dropIfExists('sellers');
    }
}
