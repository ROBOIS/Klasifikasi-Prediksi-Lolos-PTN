<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Dashboard</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::user() && Auth::user()->role === 'siswa')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nilai.index') }}">Nilai</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mapel.index') }}">Mata Pelajaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nilai.index') }}">Nilai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rekap.nilai') }}">Rekap Nilai</a>
                    </li>
                    @if(Auth::user()->role !== 'walikelas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('walikelas.index') }}">Walikelas</a>
                    </li>
                    @endif
                @endif
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="footer mt-auto py-3 bg-light border-top">
        <div class="container text-center">
            <span class="text-muted">&copy; {{ date('Y') }} Akademik App. All rights reserved.</span>
        </div>
    </footer>
</body>
</html>
