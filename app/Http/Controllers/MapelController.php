<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        // Tampilkan daftar mapel
        return view('mapel.index');
    }
    public function create()
    {
        // Tampilkan form tambah mapel
        return view('mapel.create');
    }
    public function store(Request $request)
    {
        // Simpan data mapel
        return redirect()->route('mapel.index');
    }
    public function edit($id)
    {
        // Tampilkan form edit mapel
        return view('mapel.edit');
    }
    public function update(Request $request, $id)
    {
        // Update data mapel
        return redirect()->route('mapel.index');
    }
    public function destroy($id)
    {
        // Hapus data mapel
        return redirect()->route('mapel.index');
    }
}
