<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    @extends('layouts.app')

    @section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Selamat Datang,<br><span class="fw-bold text-uppercase">{{ Auth::user()->name }}</span></h4>
            </div>
        </div>
        <div class="row g-3">
            @if(Auth::user() && Auth::user()->role === 'admin')
            <div class="col-md-3 col-6">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-people-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahSiswa ?? 0 }}</h2>
                        <div>JUMLAH SISWA</div>
                    </div>
                </div>
            </div>
            @endif
            @if(Auth::user() && Auth::user()->role === 'walikelas')
            <div class="col-md-3 col-6">
                <div class="card text-white bg-info h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-person-lines-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahSiswaWalikelas ?? 0 }}</h2>
                        <div>SISWA YANG DIAJAR</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-gender-male" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahLaki ?? 0 }}</h2>
                        <div>SISWA LAKI-LAKI DIAJAR</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-pink h-100" style="background-color:#e83e8c!important;">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-gender-female" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahPerempuan ?? 0 }}</h2>
                        <div>SISWA PEREMPUAN DIAJAR</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-success h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-trophy-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $berprestasi ?? 0 }}</h2>
                        <div>SISWA BERPRESTASI DIAJAR</div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-3 col-6">
                <div class="card text-white bg-success h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-person-badge-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahWalikelas ?? 0 }}</h2>
                        <div>WALI KELAS</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-book-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahMapel ?? 0 }}</h2>
                        <div>MATA PELAJARAN</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-clipboard-data-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahNilai ?? 0 }}</h2>
                        <div>DATA NILAI</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mt-2">
            <div class="col-md-4 col-12">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-people-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $jumlahSiswa ?? 0 }}</h2>
                        <div>JUMLAH SISWA</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="mb-3">Distribusi Jenis Kelamin</h6>
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="bg-info text-white rounded py-4 mb-2" style="min-height:100px;">
                                    <i class="bi bi-gender-male" style="font-size:2rem;"></i>
                                    <div class="fw-bold" style="font-size:1.5rem;">{{ $jumlahLaki ?? 0 }}</div>
                                    <div>Laki-laki</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-pink text-white rounded py-4 mb-2" style="background-color:#e83e8c!important; min-height:100px;">
                                    <i class="bi bi-gender-female" style="font-size:2rem;"></i>
                                    <div class="fw-bold" style="font-size:1.5rem;">{{ $jumlahPerempuan ?? 0 }}</div>
                                    <div>Perempuan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @if(Auth::user() && Auth::user()->role === 'admin')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <i class="bi bi-person-badge-fill me-2"></i> Daftar Nama Wali Kelas
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group list-group-flush">
                            @foreach(\App\Models\Walikelas::all() as $wali)
                                @php
                                    $laki = $wali->siswas()->where('jenis_kelamin','L')->count();
                                    $perempuan = $wali->siswas()->where('jenis_kelamin','P')->count();
                                    $total = $laki + $perempuan;
                                @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $wali->nama }}</span>
                                    <span class="badge bg-primary me-1">Total: {{ $total }}</span>
                                    <span class="badge bg-info me-1"><i class="bi bi-gender-male"></i> {{ $laki }}</span>
                                    <span class="badge" style="background-color:#e83e8c!important;"><i class="bi bi-gender-female"></i> {{ $perempuan }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-3 col-6">
                <div class="card text-white bg-info h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-trophy-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $berprestasi ?? 0 }}</h2>
                        <div>SISWA BERPRESTASI</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card text-white bg-secondary h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-emoji-frown-fill" style="font-size:2.5rem;"></i>
                        <h2 class="mt-2">{{ $tidakBerprestasi ?? 0 }}</h2>
                        <div>TIDAK BERPRESTASI</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
