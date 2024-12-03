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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('npm')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('gender')->nullable();
            $table->string('tempat_lhr')->nullable();
            $table->date('tanggal_lhr')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pos')->nullable();
            $table->string('hp')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('masuk')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->foreignId('prodi')->constrained('prodis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('fakultas')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('kelas')->nullable();
            $table->string('kategori')->nullable();
            $table->text('asal')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
