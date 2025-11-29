<?php

namespace App\Http\Controllers;

use App\Models\MaterialTransaction;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialTransactionController extends Controller
{
    public function index()
    {
        // Urutkan dari yang terbaru
        $transactions = MaterialTransaction::with(['material', 'user'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $materials = Material::all();
        return view('transactions.create', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $material = Material::findOrFail($request->material_id);

        // LOGIC STOK OTOMATIS
        if ($request->type == 'out') {
            // Cek stok cukup gak?
            if ($material->stock < $request->quantity) {
                return back()->with('error', 'Stok tidak cukup! Sisa: ' . $material->stock);
            }
            $material->decrement('stock', $request->quantity); // Kurangi stok
        } else {
            $material->increment('stock', $request->quantity); // Tambah stok
        }

        // Simpan Transaksi
        MaterialTransaction::create([
            'material_id' => $request->material_id,
            'user_id' => Auth::id(), // Otomatis ambil ID yang login
            'type' => $request->type,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil!');
    }
}