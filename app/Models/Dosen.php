<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nidn',
        'jabatan_akademik',
        'email',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
