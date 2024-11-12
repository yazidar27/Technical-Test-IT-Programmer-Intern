<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartemen List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Apartemen List</h2>
    <a href="{{ route('apartemen.create') }}" class="btn btn-success mb-3">Tambah Apartemen</a>
    <a href="{{ route('home') }}" class="btn btn-primary mb-3">Back to Home</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Apartemen</th>
                <th>Lantai</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartemens as $apartemen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $apartemen->nomor_apartemen }}</td>
                <td>{{ $apartemen->lantai_apartemen }}</td>
                <td>{{ $apartemen->status }}</td>
                <td>
                    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                    <a href="{{ route('apartemen.show', $apartemen->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('apartemen.edit', $apartemen->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('apartemen.destroy', $apartemen->id) }}" method="POST">
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
