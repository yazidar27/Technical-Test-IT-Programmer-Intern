<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\Apartemen;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::with('apartemen')->get();
        return view('penghuni.index', compact('penghunis'));
    }

    public function create()
    {
        $apartemens = Apartemen::where('status', 'available')->get();
        return view('penghuni.create', compact('apartemens'));
    }
    public function show($id)
{
    $penghuni = Penghuni::with('apartemen')->findOrFail($id);
    return view('penghuni.show', compact('penghuni'));
}

    public function store(Request $request)
    {
        $request->validate([
            'apart_id' => 'required|exists:apartemens,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        Penghuni::create($request->all());

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan');
    }
    public function edit($id)
{
    $penghuni = Penghuni::findOrFail($id);
    $apartemens = Apartemen::where('status', 'available')->orWhere('id', $penghuni->apart_id)->get();
    return view('penghuni.edit', compact('penghuni', 'apartemens'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'apart_id' => 'required|exists:apartemens,id',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_lahir' => 'required|date',
        'umur' => 'required|integer',
        'status' => 'required|in:aktif,non-aktif',
    ]);

    $penghuni = Penghuni::findOrFail($id);
    $penghuni->update($request->all());

    return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil diupdate');
}

public function destroy($id)
{
    $penghuni = Penghuni::findOrFail($id);
    $penghuni->delete();

    return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil dihapus');
}
}
