<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Apartemen</title>
</head>
<body>
    <h1>Edit Apartemen</h1>
    <form action="{{ route('apartemen.update', $apartemen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nomor_apartemen">Nomor Apartemen:</label>
        <input type="text" name="nomor_apartemen" id="nomor_apartemen" value="{{ $apartemen->nomor_apartemen }}" required>

        <label for="lantai_apartemen">Lantai Apartemen:</label>
        <input type="number" name="lantai_apartemen" id="lantai_apartemen" value="{{ $apartemen->lantai_apartemen }}" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="available" {{ $apartemen->status == 'available' ? 'selected' : '' }}>Available</option>
            <option value="occupied" {{ $apartemen->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
        </select>

        <button type="submit">Update</button>
    </form>
</body>
</html>
