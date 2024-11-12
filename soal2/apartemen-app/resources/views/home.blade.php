<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Selamat Datang</h2>

    <div class="my-3">
        <h3>Daftar Apartemen</h3>
        <a href="{{ route('apartemen.index') }}" class="btn btn-primary">Lihat Semua Apartemen</a>
        <ul class="list-group mt-2">
            @foreach($apartemens as $apartemen)
            <li class="list-group-item">
                <strong>Nomor Apartemen:</strong> {{ $apartemen->nomor_apartemen }} |
                <strong>Lantai:</strong> {{ $apartemen->lantai_apartemen }} |
                <strong>Status:</strong> {{ $apartemen->status }}
            </li>
            @endforeach
        </ul>
    </div>

    <div class="my-3">
        <h3>Daftar Penghuni</h3>
        <a href="{{ route('penghuni.index') }}" class="btn btn-primary">Lihat Semua Penghuni</a>
        <ul class="list-group mt-2">
            @foreach($penghunis as $penghuni)
            <li class="list-group-item">
                <strong>Nama:</strong> {{ $penghuni->nama }} |
                <strong>Jenis Kelamin:</strong> {{ $penghuni->jenis_kelamin }} |
                <strong>Apartemen:</strong> {{ $penghuni->apartemen->nomor_apartemen }}
            </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
