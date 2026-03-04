<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RekapNilaiController;
use App\Http\Controllers\WalikelasController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [LoginController::class, 'showDashboard'])->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
Route::get('/rekap-nilai', [RekapNilaiController::class, 'index'])->name('rekap.nilai');
Route::post('/rekap-nilai/update-nilai', [RekapNilaiController::class, 'updateNilai'])->name('rekap.nilai.update');
Route::get('/rekap-nilai/export', [RekapNilaiController::class, 'export'])->name('rekap.nilai.export');
Route::get('/siswa/import', [SiswaController::class, 'importForm'])->name('siswa.import.form');
Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::get('/walikelas', [WalikelasController::class, 'index'])->name('walikelas.index');
Route::get('/walikelas/create', [WalikelasController::class, 'create'])->name('walikelas.create');
Route::post('/walikelas', [WalikelasController::class, 'store'])->name('walikelas.store');
Route::get('/walikelas/{id}/edit', [WalikelasController::class, 'edit'])->name('walikelas.edit');
Route::put('/walikelas/{id}', [WalikelasController::class, 'update'])->name('walikelas.update');
Route::delete('/walikelas/{id}', [WalikelasController::class, 'destroy'])->name('walikelas.destroy');
Route::get('/nilai/import', [NilaiController::class, 'importForm'])->name('nilai.import.form');
Route::post('/nilai/import', [NilaiController::class, 'import'])->name('nilai.import');
