<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormPasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ProfileController;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Antrian;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH (CUSTOM)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| USER (FORM PASIEN)
|--------------------------------------------------------------------------
*/

Route::get('/form-pasien', [FormPasienController::class, 'showForm'])
    ->name('form-pasien.create');

Route::post('/form-pasien', [FormPasienController::class, 'store'])
    ->name('form-pasien.store');

Route::get('/antrian/hasil/{id}', [FormPasienController::class, 'hasil'])
    ->name('antrian.hasil');

/*
|--------------------------------------------------------------------------
| ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin_dashboard.dashboard', [
            'poli' => Poli::count(),
            'dokter' => Dokter::count(),
            'pasien' => Pasien::count(),
            'antrianHariIni' => Antrian::whereDate('tanggal', now())->count(),
            'antrian' => Antrian::latest()->take(5)->get(),
        ]);
    })->name('dashboard');

    // Admin Page
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    // Resource
    Route::resource('/dokter', DokterController::class);
    Route::resource('/poli', PoliController::class);
    Route::resource('/antrian', AntrianController::class);

   Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
   Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profil.edit');
   Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profil.update');
});