<?php

namespace App\Http\Controllers;

use App\Models\ProductionReport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionReportController extends Controller
{
    public function index()
    {
        // Tampilkan riwayat produksi (terbaru di atas)
        $reports = ProductionReport::with(['product', 'user'])->latest()->get();
        return view('production_reports.index', compact('reports'));
    }

    public function create()
    {
        // Operator butuh pilih produk apa yang dia kerjakan
        $products = Product::all();
        return view('production_reports.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_result' => 'required|integer|min:1', // Hasil Bagus
            'quantity_reject' => 'nullable|integer|min:0', // Hasil Rusak (Opsional)
            'production_date' => 'required|date',
        ]);

        // 1. Simpan Laporan
        ProductionReport::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(), // Otomatis catat siapa operatornya
            'quantity_result' => $request->quantity_result,
            'quantity_reject' => $request->quantity_reject ?? 0,
            'production_date' => $request->production_date,
            'notes' => $request->notes,
        ]);

        // 2. LOGIC PENTING: Tambah Stok Produk Jadi
        // Hanya yang bagus (quantity_result) yang masuk stok
        $product = Product::findOrFail($request->product_id);
        $product->increment('stock', $request->quantity_result);

        return redirect()->route('production-reports.index')
            ->with('success', 'Laporan produksi berhasil disimpan & stok produk bertambah!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
