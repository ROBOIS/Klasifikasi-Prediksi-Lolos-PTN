<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        // Tampilkan daftar nilai
        return view('nilai.index');
    }
    public function create()
    {
        // Tampilkan form tambah nilai
        return view('nilai.create');
    }
    public function store(Request $request)
    {
        // Simpan data nilai
        return redirect()->route('nilai.index');
    }
    public function edit($id)
    {
        // Tampilkan form edit nilai
        return view('nilai.edit');
    }
    public function update(Request $request, $id)
    {
        // Update data nilai
        return redirect()->route('nilai.index');
    }
    public function destroy($id)
    {
        // Hapus data nilai
        return redirect()->route('nilai.index');
    }
}
