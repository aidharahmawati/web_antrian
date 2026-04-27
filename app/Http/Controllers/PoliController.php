<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;


class PoliController extends Controller
{


    public function index()
    {
        $poli = Poli::all();
        return view('admin_dashboard.admin.poli.index', compact('poli'));
    }

    public function create()
    {
        return view('admin_dashboard.admin.poli.create');
    }

    public function store(Request $request)
{
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Poli::create([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('poli.index')
            ->with('success', 'Poli berhasil ditambahkan.');
    }

    public function show($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin_dashboard.admin.poli.show', compact('poli'));
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin_dashboard.admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'string',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('poli.index')->with('success', 'Poli berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();
        return redirect()->route('poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}
