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
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onDelete('restrict');
            $table->unsignedBigInteger('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('restrict');
            $table->unsignedBigInteger('hari_id');
            $table->foreign('hari_id')->references('id')->on('haris')->onDelete('restrict');
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict');
            $table->unsignedBigInteger('jam_id');
            $table->foreign('jam_id')->references('id')->on('jams')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliahs');
    }
};
