<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartemen;

class ApartemenController extends Controller
{
    public function index()
    {
        $apartemens = Apartemen::all();
        return view('apartemen.index', compact('apartemens'));
    }

    public function create()
    {
        return view('apartemen.create');
    }
    public function edit($id)
{
    $apartemen = Apartemen::findOrFail($id);
    return view('apartemen.edit', compact('apartemen'));
}
public function show($id)
{
    $apartemen = Apartemen::findOrFail($id);
    return view('apartemen.show', compact('apartemen'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'nomor_apartemen' => 'required|string|max:255',
        'lantai_apartemen' => 'required|integer',
        'status' => 'required|in:available,occupied',
    ]);

    $apartemen = Apartemen::findOrFail($id);
    $apartemen->update($request->all());

    return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil diupdate');
}

    public function store(Request $request)
    {
        $request->validate([
            'nomor_apartemen' => 'required|string|max:255',
            'lantai_apartemen' => 'required|integer',
            'status' => 'required|in:available,occupied',
        ]);

        Apartemen::create($request->all());

        return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $apartemen = Apartemen::findOrFail($id);
        $apartemen->delete();

        return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil dihapus');
    }
}
