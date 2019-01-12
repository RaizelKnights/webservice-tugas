<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->unique();
            $table->string('penerbit');
            $table->string('penulis')->nullable();
            $table->string('isbn')->nullable();
            $table->decimal('harga')->nullable();
            $table->year('tahun')->nullable();
            $table->string('sinopsis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
