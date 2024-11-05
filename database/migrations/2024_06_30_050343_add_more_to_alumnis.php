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
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('ipk')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('no_alumni')->nullable();
            $table->string('tempat_lhr')->nullable();
            $table->date('tanggal_lhr')->nullable();
            $table->enum('gender', ['Laki-Laki', 'Perempuan'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            //
        });
    }
};
