<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Apartemen</title>
</head>
<body>
    <h1>Tambah Apartemen Baru</h1>
    <form action="{{ route('apartemen.store') }}" method="POST">
        @csrf

        <label for="nomor_apartemen">Nomor Apartemen:</label>
        <input type="text" name="nomor_apartemen" id="nomor_apartemen" required>

        <label for="lantai_apartemen">Lantai Apartemen:</label>
        <input type="number" name="lantai_apartemen" id="lantai_apartemen" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
