@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex align-items-center">
            <i class="bi bi-bar-chart-fill me-2" style="font-size:1.5rem;"></i>
            <h5 class="mb-0">Rekap Nilai Siswa</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('rekap.nilai.export', ['type' => 'xlsx']) }}" class="btn btn-success btn-sm me-2">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
                <a href="{{ route('rekap.nilai.export', ['type' => 'csv']) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-file-earmark-spreadsheet"></i> Export CSV
                </a>
            </div>
            <form method="GET" action="" class="mb-3 d-flex flex-wrap align-items-center" style="max-width:600px;">
                <input type="text" name="search" class="form-control form-control-sm me-2 mb-2" placeholder="Cari nama siswa..." value="{{ request('search') }}" style="max-width:180px;">
                <select name="kelas" class="form-select form-select-sm me-2 mb-2" style="max-width:140px;">
                    <option value="">Semua Kelas</option>
                    @php
                        $daftar_kelas = $siswas->pluck('kelas')->unique()->sort()->values();
                    @endphp
                    @foreach($daftar_kelas as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-primary btn-sm mb-2">Cari</button>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2">NO</th>
                            <th rowspan="2">NAMA</th>
                            @foreach($mapels as $mapel)
                                <th colspan="1">{{ $mapel->nama }}</th>
                            @endforeach
                            <th rowspan="2">Rata-rata</th>
                        </tr>
                        <tr>
                            @foreach($mapels as $mapel)
                                <th>Nilai</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswas as $i => $siswa)
                        <tr>
                            <td>{{ isset($siswas->currentPage) ? (($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration) : ($i + 1) }}</td>
                            <td class="text-start">{{ $siswa->nama }}</td>
                            @php $total = 0; $count = 0; @endphp
                            @foreach($mapels as $mapel)
                                @php
                                    $nilaiObj = $siswa->nilais->where('matapelajaran_id', $mapel->id)->first();
                                    $nilai = $nilaiObj ? $nilaiObj->nilai : null;
                                    if($nilai !== null) { $total += $nilai; $count++; }
                                @endphp
                                <td>
                                    <input type="number" min="0" max="100" step="0.01" class="form-control form-control-sm nilai-input" 
                                        data-siswa-id="{{ $siswa->id }}" data-mapel-id="{{ $mapel->id }}" value="{{ $nilai ?? '' }}" style="width:70px; text-align:center;">
                                </td>
                            @endforeach
                            <td><span class="fw-bold">{{ $count ? number_format($total/$count,2) : '-' }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(method_exists($siswas, 'withQueryString'))
                    {{ $siswas->withQueryString()->onEachSide(1)->links('pagination::bootstrap-5') }}
                @endif
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(function() {
                $('.nilai-input').on('change', function() {
                    var input = $(this);
                    var siswaId = input.data('siswa-id');
                    var mapelId = input.data('mapel-id');
                    var nilai = input.val();
                    $.ajax({
                        url: '/rekap-nilai/update-nilai',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            siswa_id: siswaId,
                            mapel_id: mapelId,
                            nilai: nilai
                        },
                        success: function(res) {
                            input.addClass('is-valid');
                            setTimeout(function(){ input.removeClass('is-valid'); }, 1000);
                        },
                        error: function() {
                            input.addClass('is-invalid');
                            setTimeout(function(){ input.removeClass('is-invalid'); }, 2000);
                        }
                    });
                });
            });
            </script>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
