<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;

class FormPasienController extends Controller
{
    public function showForm()
    {
        $poli = Poli::all();
        $dokter = Dokter::all();

       return view('layouts.user_dashboard.form-pasien.create', compact('poli','dokter'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_pasien' => 'required|string|max:255',
        'poli_id' => 'required|exists:poli,id',
        'dokter_id' => 'required|exists:dokter,id',
        'alamat' => 'nullable|string|max:255',
        'telp' => 'nullable|string|max:16',

    ]);

    // ✅ simpan pasien
    $pasien = Pasien::create([
        'nama_pasien' => $request->nama_pasien,
        'alamat' => $request->alamat ?? '',
        'telp' => $request->telp ?? '',
        'poli_id' => $request->poli_id,
        'dokter_id' => $request->dokter_id,
    ]);

    // 🔥 ambil tanggal hari ini
    $today = date('Y-m-d');

    // 🔥 ambil antrian terakhir
    $last = Antrian::where('tanggal', $today)->orderBy('id','desc')->first();

    $no = $last ? ((int) substr($last->nomor_antrian,1)) + 1 : 1;

    $kode = 'A' . str_pad($no, 3, '0', STR_PAD_LEFT);

    $antrian = Antrian::all()->last(); // Ambil antrian terakhir untuk mendapatkan ID terbaru
    // ✅ simpan antrian
   $antrian = Antrian::create([
    'nomor_antrian' => $kode,
    'tanggal' => $today,
    'status' => 'menunggu',
    'pasien_id' => $pasien->id,
    'poli_id' => $request->poli_id,
    'dokter_id' => $request->dokter_id,
]);

return redirect()->route('antrian.hasil', $antrian->id);
}

public function hasil($id)
{
    $antrian = Antrian::with(['pasien','dokter','poli'])->findOrFail($id);

    return view('layouts.user_dashboard.form-pasien.nomor_antrian', compact('antrian'));
}


}
