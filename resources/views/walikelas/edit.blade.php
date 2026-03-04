@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Wali Kelas</h1>
    <form action="{{ route('walikelas.update', $wali->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $wali->nama }}" required>
        </div>
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $wali->nip }}" required>
        </div>
        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control" value="{{ $wali->kontak }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $wali->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('walikelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
