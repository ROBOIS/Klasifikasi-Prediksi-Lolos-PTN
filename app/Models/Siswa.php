<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nis',
        'nisn',
        'kelas',
        'walikelas_id',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'kontak',
        'nama_ibu',
        'nama_ayah',
        'jenis_kelamin'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function walikelas()
    {
        return $this->belongsTo(Walikelas::class);
    }
}
