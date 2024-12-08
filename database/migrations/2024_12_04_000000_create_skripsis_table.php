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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->string('judul_skripsi');
            $table->string('deskripsi');
            $table->year('tahun_publikasi');
            $table->string('jenis_dokumen');
            $table->string('file_skripsi');
            $table->string('lokasi_fisik')->nullable();
            
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade'); // Relasi ke mahasiswa

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
