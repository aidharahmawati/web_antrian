<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';

    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];
public function dokter()
{
    return $this->hasMany(Dokter::class, 'poli_id');
}

public function pasien()
{
    return $this->hasMany(Pasien::class, 'poli_id');
}

public function antrian()
{
    return $this->hasMany(Antrian::class, 'poli_id');
}

}
