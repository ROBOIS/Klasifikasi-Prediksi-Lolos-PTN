@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark d-flex align-items-center">
            <i class="bi bi-clipboard-data-fill me-2" style="font-size:1.5rem;"></i>
            <h5 class="mb-0">Data Nilai Siswa</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <form method="GET" action="{{ route('nilai.index') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari nama siswa, mapel..." value="{{ request('q') }}">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        @if(Auth::user()->role !== 'siswa')
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        @endif
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                        @if(Auth::user()->role !== 'siswa')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilais as $nilai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if(Auth::user()->role !== 'siswa')
                        <td class="text-start">{{ $nilai->siswa->nama }}</td>
                        <td>{{ $nilai->siswa->kelas }}</td>
                        @endif
                        <td class="text-start">{{ $nilai->matapelajaran->nama }}</td>
                        <td>{{ $nilai->nilai }}</td>
                        @if(Auth::user()->role !== 'siswa')
                        <td>
                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $nilais->links('pagination::bootstrap-5') }}
            @if(Auth::user()->role !== 'siswa')
            <a href="{{ route('nilai.create') }}" class="btn btn-primary mt-2">Tambah Nilai</a>
            <a href="{{ route('nilai.import.form') }}" class="btn btn-success mt-2 ms-2">Import Nilai (Excel)</a>
            @endif
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
