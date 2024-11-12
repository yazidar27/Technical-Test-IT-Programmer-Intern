<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penghuni</title>
</head>
<body>
    <h1>Detail Penghuni</h1>

    <p><strong>Nama:</strong> {{ $penghuni->nama }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $penghuni->jenis_kelamin }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $penghuni->tanggal_lahir }}</p>
    <p><strong>Umur:</strong> {{ $penghuni->umur }}</p>
    <p><strong>Status:</strong> {{ $penghuni->status == 'aktif' ? 'Aktif' : 'Non-Aktif' }}</p>
    
    <h3>Informasi Apartemen</h3>
    <p><strong>Nomor Apartemen:</strong> {{ $penghuni->apartemen->nomor_apartemen ?? 'Tidak ada' }}</p>
    <p><strong>Lantai:</strong> {{ $penghuni->apartemen->lantai_apartemen ?? 'Tidak ada' }}</p>
    
    <a href="{{ route('penghuni.index') }}">Kembali ke Daftar Penghuni</a>
</body>
</html>
