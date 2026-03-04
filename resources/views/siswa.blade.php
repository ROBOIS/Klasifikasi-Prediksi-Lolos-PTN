@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-people-fill me-2" style="font-size:1.5rem;"></i>
            <h5 class="mb-0">Data Siswa</h5>
        </div>
        <div class="card-body">
            @if(Auth::user()->role === 'siswa')
                <a href="{{ route('siswa.edit', Auth::user()->siswa_id) }}" class="btn btn-warning btn-sm mb-2">Edit Profil</a>
            @endif
            <div class="row mb-3">
                <div class="col-md-4">
                    <form method="GET" action="{{ route('siswa.index') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari nama, NISN, NIS, kelas, alamat, kontak..." value="{{ request('q') }}">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Status Prestasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->kontak }}</td>
                        <td>
                            @php
                                $rata2 = $siswa->nilais->avg('nilai');
                                // Regresi logistik sederhana: p = 1 / (1 + exp(-(a + b * rata2)))
                                // Misal threshold 82, kita set b = 0.3, a = -24.6 (supaya p ~0.5 saat rata2=82)
                                $b = 0.3;
                                $a = -24.6;
                                $logit = $a + $b * $rata2;
                                $prob = 1 / (1 + exp(-$logit));
                            @endphp
                            <div>
                                @if($rata2 > 82)
                                    <span class="badge bg-success">Berprestasi</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Berprestasi</span>
                                @endif
                            </div>
                            <div>
                                <small>Probabilitas Berprestasi: <b>{{ number_format($prob * 100, 2) }}%</b></small>
                            </div>
                        </td>
                        <td>
                            @if(Auth::user()->role === 'siswa')
                                <a href="{{ route('siswa.edit', Auth::user()->siswa_id) }}" class="btn btn-warning btn-sm">Edit Profil</a>
                            @else
                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $siswas->withQueryString()->onEachSide(1)->links('pagination::bootstrap-5') }}
            @if(Auth::user()->role !== 'siswa')
                <a href="{{ route('siswa.create') }}" class="btn btn-primary mt-2">Tambah Siswa</a>
                <a href="{{ route('siswa.import.form') }}" class="btn btn-success mt-2"><i class="bi bi-upload"></i> Import Siswa</a>
            @endif
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@if(Auth::user()->role === 'siswa')
    <script>
        // Sembunyikan kolom aksi, search, dan pagination untuk siswa
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('th:last-child, td:last-child').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.input-group, .pagination').forEach(el => el.style.display = 'none');
        });
    </script>
@endif
@endsection
