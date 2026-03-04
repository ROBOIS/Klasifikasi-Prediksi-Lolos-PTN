@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white d-flex align-items-center">
            <i class="bi bi-upload me-2" style="font-size:1.5rem;"></i>
            <h5 class="mb-0">Import Data Nilai</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Pilih file Excel (.xlsx, .xls, .csv)</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Import</button>
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </form>
            <div class="mt-3">
                <strong>Format kolom yang didukung:</strong>
                <ul>
                    <li><code>siswa_id</code> (ID siswa)</li>
                    <li><code>matapelajaran_id</code> (ID mapel)</li>
                    <li><code>nilai</code> (angka)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
