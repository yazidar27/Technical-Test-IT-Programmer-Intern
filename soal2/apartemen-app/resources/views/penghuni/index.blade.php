<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghuni List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Penghuni List</h2>
    <a href="{{ route('penghuni.create') }}" class="btn btn-success mb-3">Tambah Penghuni</a>
    <a href="{{ route('home') }}" class="btn btn-primary mb-3">Back to Home</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penghuni</th>
                <th>Jenis Kelamin</th>
                <th>Apartemen</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penghunis as $penghuni)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penghuni->nama }}</td>
                <td>{{ $penghuni->jenis_kelamin }}</td>
                <td>{{ $penghuni->apartemen->nomor_apartemen }}</td>
                <td>{{ $penghuni->status }}</td>
                <td>
                    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                    <a href="{{ route('penghuni.show', $penghuni->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('penghuni.edit', $penghuni->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
