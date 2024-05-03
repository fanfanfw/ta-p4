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
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('nama_dosens')->onDelete('restrict');
=======
            // $table->unsignedBigInteger('nama_dosen_id');
            // $table->foreign('nama_dosen_id')->references('id')->on('nama_dosens')->onDelete('restrict');
>>>>>>> 225cc8a6a544406c0afffd70899101150d28f89a
            $table->unsignedBigInteger('program_studi_id');
            $table->foreign('program_studi_id')->references('id')->on('program_studis')->onDelete('restrict');
            $table->string('kode_matakuliah');
            $table->string('name');
            $table->integer('sks');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
