<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap', 'npm', 'tahun_masuk', 'kontak', 'dosen_id', 'prodi_id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function skripsi()
    {
        return $this->hasOne(Skripsi::class);
    }
}
