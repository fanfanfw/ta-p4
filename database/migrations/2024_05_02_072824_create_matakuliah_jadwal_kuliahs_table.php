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
        Schema::create('matakuliah_jadwal_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onDelete('restrict');
            $table->unsignedBigInteger('jadwal_kuliah_id');
            $table->foreign('jadwal_kuliah_id')->references('id')->on('jadwal_kuliahs')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah_jadwal_kuliahs');
    }
};
