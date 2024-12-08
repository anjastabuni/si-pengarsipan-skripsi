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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('npm')->unique();
            $table->year('tahun_masuk');
            $table->string('kontak')->nullable();

            // Foreign keys
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade'); // Relasi ke dosen
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade'); // Relasi ke prodi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
