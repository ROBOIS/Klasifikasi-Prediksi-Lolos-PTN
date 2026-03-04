@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Siswa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                    </div>
                    <div class="col">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}" required>
                    </div>
                    <div class="col">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required @if(Auth::user()->role === 'siswa') readonly @endif>
                    </div>
                    <div class="col">
                        <label>NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required @if(Auth::user()->role === 'siswa') readonly @endif>
                    </div>
                    <div class="col">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required @if(Auth::user()->role === 'siswa') readonly @endif>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Wali Kelas</label>
                        @if(Auth::user()->role === 'admin')
                            <select name="walikelas_id" class="form-control">
                                @foreach(\App\Models\Walikelas::all() as $wali)
                                    <option value="{{ $wali->id }}" {{ $siswa->walikelas_id == $wali->id ? 'selected' : '' }}>{{ $wali->nama }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{ $siswa->walikelas ? $siswa->walikelas->nama : '-' }}" readonly>
                        @endif
                    </div>
                    <div class="col">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat }}" required>
                    </div>
                    <div class="col">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ $siswa->kontak }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->nama_ibu }}" required>
                    </div>
                    <div class="col">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->nama_ayah }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
