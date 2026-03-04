@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white d-flex align-items-center">
            <i class="bi bi-book-fill me-2" style="font-size:1.5rem;"></i>
            <h5 class="mb-0">Data Mata Pelajaran</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <form method="GET" action="{{ route('mapel.index') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari nama mata pelajaran..." value="{{ request('q') }}">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapels as $mapel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start">{{ $mapel->nama }}</td>
                        <td>
                            <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('mapel.create') }}" class="btn btn-primary mt-2">Tambah Mata Pelajaran</a>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
