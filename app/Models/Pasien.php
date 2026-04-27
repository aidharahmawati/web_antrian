<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'telp',
        'poli_id',
        'dokter_id',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function antrian()
    {
    return $this->hasMany(Antrian::class, 'pasien_id');
    }
}
