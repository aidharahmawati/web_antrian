<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poli;


class AntrianController extends Controller
{
public function index()
{
    $antrian = Antrian::with(['pasien','dokter','poli'])
                ->orderBy('created_at', 'desc')
                ->get();
    $pasien = Pasien::all();
    $dokter = Dokter::all();
    $poli = Poli::all();

    return view('admin_dashboard.admin.antrian.index', compact('antrian','pasien','dokter','poli'));
}

public function create()
{
    $pasien = Pasien::all();
    $dokter = Dokter::all();
    $poli = Poli::all();

    return view('admin_dashboard.admin.antrian.create', compact('pasien', 'dokter', 'poli'));           
}

public function store(Request $request)
{
    $request->validate([
        'pasien_id' => 'required|exists:pasien,id',
        'poli_id' => 'required|exists:poli,id',
        'dokter_id' => 'required|exists:dokter,id',
    ]);

    // ambil tanggal hari ini
    $last = Antrian::orderBy('id', 'desc')->first();

$nomor = $last 
    ? intval(substr($last->nomor_antrian, 1)) + 1 
    : 1;

$kode = 'A' . str_pad($nomor, 3, '0', STR_PAD_LEFT);

    // simpan
    $antrian = Antrian::create([
    'nomor_antrian' => $kode,
    'tanggal' => date('Y-m-d'),
    'status' => 'menunggu',
    'pasien_id' => $request->pasien_id,
    'dokter_id' => $request->dokter_id,
    'poli_id' => $request->poli_id,
]);

return redirect()->route('antrian.show', $antrian->id);

}

public function show($id)
{
    $antrian = Antrian::with(['pasien','dokter','poli'])->findOrFail($id);
    return view('admin_dashboard.admin.antrian.show', compact('antrian'));
}

public function edit($id)
{
    $antrian = Antrian::findOrFail($id);
    $pasien = Pasien::all();
    $dokter = Dokter::all();
    $poli = Poli::all();

    return view('admin_dashboard.admin.antrian.edit', compact('antrian','pasien','dokter','poli'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'pasien_id' => 'required|exists:pasien,id',
        'poli_id' => 'required|exists:poli,id',
        'dokter_id' => 'required|exists:dokter,id',
        'status' => 'required|string|max:255',
    ]);

    $antrian = Antrian::findOrFail($id);
    $antrian->update([
        'pasien_id' => $request->pasien_id,
        'poli_id' => $request->poli_id,
        'dokter_id' => $request->dokter_id,
        'status' => $request->status,
    ]);

    return redirect()->route('antrian.index')->with('success', 'Antrian berhasil diperbarui.');
}

public function destroy($id)
{
    $antrian = Antrian::findOrFail($id);
    $antrian->delete();
    return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus.');
}


}