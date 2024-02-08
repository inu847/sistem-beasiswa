<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ayah',
        'nama_ibu',
        'alamat_ortu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_hp_ayah',
        'no_hp_ibu',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'siswa_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
