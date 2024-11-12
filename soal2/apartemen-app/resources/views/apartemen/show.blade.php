<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Apartemen</title>
</head>
<body>
    <h1>Detail Apartemen</h1>
    
    <p><strong>Nomor Apartemen:</strong> {{ $apartemen->nomor_apartemen }}</p>
    <p><strong>Lantai:</strong> {{ $apartemen->lantai_apartemen }}</p>
    <p><strong>Status:</strong> {{ $apartemen->status == 'available' ? 'Available' : 'Occupied' }}</p>

    <a href="{{ route('apartemen.index') }}">Kembali ke Daftar Apartemen</a>
</body>
</html>
