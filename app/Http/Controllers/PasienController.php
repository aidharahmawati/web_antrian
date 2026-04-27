<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = [
            ['id' => 1, 'name' => 'Alice Johnson', 'poli' => 'Poli Umum'],
            ['id' => 2, 'name' => 'Bob Smith', 'poli' => 'Poli Gigi'],
            ['id' => 3, 'name' => 'Charlie Brown', 'poli' => 'Poli Anak'],
        ];
        return view('admin_dashboard.pasien.index', compact('pasien'));
    }

    public function show($id)
    {
        $pasien = Pasien::with('poli')->findOrFail($id);
        return view('admin_dashboard.pasien.show', compact('pasien'));
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
