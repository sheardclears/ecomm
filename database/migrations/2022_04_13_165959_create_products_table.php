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
            $table->bigInteger('cate_id');
            $table->bigInteger('vendors_id');
            $table->string('name');
            $table->string('vendors');
            $table->string('slug');
            $table->longText('desc');
            $table->string('sellprice');
            $table->string('qty');
            $table->string('image');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('trending')->default('0');
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
