<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penghuni</title>
</head>
<body>
    <h1>Edit Penghuni</h1>
    <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="apart_id">Apartemen:</label>
        <select name="apart_id" id="apart_id" required>
            @foreach($apartemens as $apartemen)
                <option value="{{ $apartemen->id }}" {{ $penghuni->apart_id == $apartemen->id ? 'selected' : '' }}>
                    {{ $apartemen->nomor_apartemen }} - Lantai {{ $apartemen->lantai_apartemen }}
                </option>
            @endforeach
        </select>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $penghuni->nama }}" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="Laki-laki" {{ $penghuni->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $penghuni->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $penghuni->tanggal_lahir }}" required>

        <label for="umur">Umur:</label>
        <input type="number" name="umur" id="umur" value="{{ $penghuni->umur }}" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="aktif" {{ $penghuni->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="non-aktif" {{ $penghuni->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
        </select>

        <button type="submit">Update</button>
    </form>
</body>
</html>
