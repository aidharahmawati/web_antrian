<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;


class DokterController extends Controller
{
    public function index()
    {
        // ambil data dokter + relasi poli
        $dokter = Dokter::with('poli')->get();

        return view('admin_dashboard.admin.dokter.index', compact('dokter'));
    }

    public function create()
    {
        $poli = \App\Models\Poli::all();
        return view('admin_dashboard.admin.dokter.create', compact('poli'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'poli_id' => 'required|exists:poli,id',
        ]);

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'poli_id' => $request->poli_id,
        ]);
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('admin_dashboard.admin.dokter.show', compact('dokter'));
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $poli = Poli::all();
        return view('admin_dashboard.admin.dokter.edit', compact('dokter', 'poli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'poli_id' => 'required|exists:poli,id',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update([
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'poli_id' => $request->poli_id,
        ]);
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }   

}
