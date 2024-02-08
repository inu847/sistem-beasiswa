<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nis',
        'birth',
        'address',
        'religion',
        'phone',
        
        'kwh_rumah',
        'nilai_rapor',
        'foto_rumah_tampak_depan',
        'foto_rumah_tampak_kiri',
        'foto_rumah_tampak_kanan',
        'foto_rumah_tampak_belakang',
        'foto_rumah_dapur',
        'foto_rumah_tempat_belajar',
        'foto_rumah_foto_bersama_dalam_rumah',

        'status_beasiswa',
        'type_beasiswa',
        'keterangan',
    ];

    public function perwalian()
    {
        return $this->hasOne(Perwalian::class);
    }
}
