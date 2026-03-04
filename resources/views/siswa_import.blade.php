@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Import Data Siswa</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Pilih File Excel/CSV</label>
                    <input type="file" name="file" class="form-control" required accept=".xlsx,.xls,.csv">
                </div>
                <button type="submit" class="btn btn-success">Import</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
            <div class="mt-3">
                <small class="text-muted">Format kolom: nama, tempat_lahir, tanggal_lahir, nisn, nis, kelas, tingkatan_kelas, alamat, kontak, foto, nama_ibu, nama_ayah, jenis_kelamin, walikelas_id</small>
            </div>
        </div>
    </div>
</div>
@endsection
