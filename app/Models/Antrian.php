<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';

    protected $fillable = [
        'nomor_antrian',
        'tanggal',
        'status',
        'pasien_id',
        'dokter_id',
        'poli_id',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');    
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }


}
