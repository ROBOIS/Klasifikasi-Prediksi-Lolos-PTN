@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Wali Kelas</h1>
    <div class="row mb-3">
        <div class="col-md-4">
            <form method="GET" action="{{ route('walikelas.index') }}">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari nama, NIP, kontak, alamat..." value="{{ request('q') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($walikelas as $wali)
            <tr>
                <td>{{ $wali->nama }}</td>
                <td>{{ $wali->nip }}</td>
                <td>{{ $wali->kontak }}</td>
                <td>{{ $wali->alamat }}</td>
                <td>
                    <a href="{{ route('walikelas.edit', $wali->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('walikelas.destroy', $wali->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('walikelas.create') }}" class="btn btn-primary">Tambah Wali Kelas</a>
</div>
@endsection
