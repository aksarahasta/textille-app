<?php

namespace App\Http\Controllers;

use App\Models\ProductionSchedule;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductionScheduleController extends Controller
{
    public function index()
    {
        // Tampilkan jadwal urut dari yang paling baru dibuat
        $schedules = ProductionSchedule::with('product')->latest()->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $products = Product::all();
        return view('schedules.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'planned_quantity' => 'required|integer|min:1',
        ]);

        ProductionSchedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal produksi berhasil dibuat!');
    }

    public function edit(ProductionSchedule $schedule)
    {
        $products = Product::all();
        return view('schedules.edit', compact('schedule', 'products'));
    }

    public function update(Request $request, ProductionSchedule $schedule)
    {
        $request->validate([
            'product_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'planned_quantity' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Status jadwal diperbarui!');
    }

    public function destroy(ProductionSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal dihapus.');
    }
}