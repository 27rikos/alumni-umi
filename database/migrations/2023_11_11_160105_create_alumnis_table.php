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
            $table->foreignId('peminatan')->constrained('peminatans')->cascadeOnDelete();
            $table->foreignId('prodi')->constrained('prodis')->cascadeOnDelete();
            $table->string('thn_lulus')->nullable();
            $table->date('sempro')->nullable();
            $table->date('semhas')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->date('mejahijau')->nullable();
            $table->date('yudisium')->nullable();
            $table->string('judul')->nullable();
            $table->text('file')->nullable();
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
        Schema::dropIfExists('alumni');
    }
};
