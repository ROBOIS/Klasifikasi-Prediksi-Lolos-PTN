@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
