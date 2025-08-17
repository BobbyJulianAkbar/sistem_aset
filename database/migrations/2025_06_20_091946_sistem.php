<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properti', function (Blueprint $table) {
            $table->increments('id_properti')->primary();
            $table->string('nama_properti');
            $table->string('luas_properti');
            $table->string('tipe_properti');
            $table->string('harga_properti');
            $table->string('status_properti');
            $table->timestamps();
        });
        Schema::create('klien', function (Blueprint $table) {
            $table->increments('id_klien')->primary();
            $table->string('nama_klien');
            $table->string('no_hp_klien');
            $table->string('email_klien')->nullable();
            $table->timestamps();
        });
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->increments('id_pemasukan')->primary();
            $table->unsignedInteger('id_klien');
            $table->foreign('id_klien')->references('id_klien')->on('klien')->onDelete('cascade');
            $table->unsignedInteger('id_properti');
            $table->foreign('id_properti')->references('id_properti')->on('properti')->onDelete('cascade');
            $table->string('tipe_pembayaran');
            $table->string('jlh_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properti');
        Schema::dropIfExists('klien');
        Schema::dropIfExists('pemasukan');
    }
};
