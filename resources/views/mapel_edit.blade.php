@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Pelajaran</h1>
    <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama" class="form-control" value="{{ $mapel->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
