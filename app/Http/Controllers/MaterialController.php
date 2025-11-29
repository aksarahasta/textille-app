<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim user
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Simpan ke Database
        Material::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
        ]);

        // 3. Kembali ke halaman tabel dengan pesan sukses
        return redirect()->route('materials.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::findOrFail($id);
        
        // Kirim data bahan ke tampilan edit
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi inputan baru
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Ambil data lama & Update
        $material = Material::findOrFail($id);
        $material->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
        ]);

        // 3. Kembali ke tabel
        return redirect()->route('materials.index')->with('success', 'Data bahan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Cari data berdasarkan ID
        $material = Material::findOrFail($id);

        // 2. Hapus data tersebut
        $material->delete();

        // 3. Kembali ke tabel dengan pesan
        return redirect()->route('materials.index')->with('success', 'Data bahan berhasil dihapus!');
    }
}
