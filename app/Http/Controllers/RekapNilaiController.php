<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapNilaiController extends Controller
{
    public function index()
    {
        // Tampilkan rekap nilai
        return view('rekap_nilai.index');
    }
    public function updateNilai(Request $request)
    {
        // Update nilai rekap
        return redirect()->route('rekap.nilai');
    }
    public function export()
    {
        // Export rekap nilai
        return response()->json(['message' => 'Export berhasil']);
    }
}
