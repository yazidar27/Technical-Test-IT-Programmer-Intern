<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penghuni</title>
</head>
<body>
    <h1>Tambah Penghuni Baru</h1>
    <form action="{{ route('penghuni.store') }}" method="POST">
        @csrf
        <label for="apart_id">Apartemen:</label>
        <select name="apart_id" id="apart_id" required>
            <option value="">Pilih Apartemen</option>
            @foreach($apartemens as $apartemen)
                <option value="{{ $apartemen->id }}">{{ $apartemen->nomor_apartemen }} - Lantai {{ $apartemen->lantai_apartemen }}</option>
            @endforeach
        </select>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>

        <label for="umur">Umur:</label>
        <input type="number" name="umur" id="umur" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="aktif">Aktif</option>
            <option value="non-aktif">Non-Aktif</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
