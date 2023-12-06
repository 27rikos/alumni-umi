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
            $table->string('peminatan')->nullable();
            $table->string('prodi')->nullable();
            $table->string('thn_lulus')->nullable();
            $table->date('sempro');
            $table->date('semhas');
            $table->date('mejahijau');
            $table->date('yudisium');
            $table->string('judul');
            $table->string('pekerjaan')->nullable();
            $table->text('file');
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