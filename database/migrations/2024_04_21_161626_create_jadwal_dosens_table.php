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
        Schema::create('jadwal_dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('matakuliah_id')->constrained('matakuliahs');
            $table->foreignId('program_studi_id')->constrained('program_studis');
            $table->foreignId('ruangan_id')->constrained('ruangans');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('hari_id')->constrained('haris');
            $table->string('jam_pelajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_dosens');
    }
};
