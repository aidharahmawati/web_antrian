<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'poli_id',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    public function antrian()
{
    return $this->hasMany(Antrian::class, 'dokter_id');
}

    public function pasien()
    {
    return $this->hasMany(Pasien::class, 'dokter_id');
    }
}
