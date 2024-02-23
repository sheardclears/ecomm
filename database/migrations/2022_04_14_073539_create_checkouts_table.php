<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama');
            $table->string('notelp');
            $table->string('Alamat');
            $table->string('Kecamatan');
            $table->string('Kabupaten');
            $table->string('Provinsi');
            $table->string('Kodepos');
            $table->string('Keterangan')->nullable();
            $table->string('total_price');
            $table->tinyInteger('status')->default('0');
            $table->string('message')->nullable();
            $table->string('update')->nullable();
            $table->string('notracking');
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
        Schema::dropIfExists('checkouts');
    }
}
