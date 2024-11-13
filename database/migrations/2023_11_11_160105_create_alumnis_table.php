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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('npm')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('stambuk')->nullable();
            $table->foreignId('peminatan')->references('id')->on('peminatans')->cascadeOnDelete();
            $table->foreignId('prodi')->references('id')->on('prodis')->cascadeOnDelete();
            $table->string('thn_lulus')->nullable();
            $table->date('sempro')->nullable();
            $table->date('semhas')->nullable();
            $table->date('mejahijau')->nullable();
            $table->date('yudisium')->nullable();
            $table->string('judul')->nullable();
            $table->text('file')->nullable();
            $table->string('nik')->nullable();
            $table->text('ktp')->nullable();
            $table->text('ijazah')->nullable();
            $table->unsignedBigInteger('penguji1');
            $table->unsignedBigInteger('penguji2');
            $table->unsignedBigInteger('pembimbing1');
            $table->unsignedBigInteger('pembimbing2');
            $table->foreign('penguji1')->references('id')->on('dosens')->cascadeOnDelete();
            $table->foreign('penguji2')->references('id')->on('dosens')->cascadeOnDelete();
            $table->foreign('pembimbing1')->references('id')->on('dosens')->cascadeOnDelete();
            $table->foreign('pembimbing2')->references('id')->on('dosens')->cascadeOnDelete();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('alumnis');
    }
};