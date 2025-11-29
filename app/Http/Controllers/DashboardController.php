<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Material;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductionReport;
use App\Models\ProductionSchedule;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        // 1. DATA UNTUK ADMIN
        if ($role == 'admin') {
            $data = [
                'total_users' => User::count(),
                'total_materials' => Material::count(),
                'total_products' => Product::count(),
                'total_suppliers' => Supplier::count(),
                // Ambil 5 transaksi terakhir untuk tabel mini
                'recent_activities' => \App\Models\MaterialTransaction::latest()->take(5)->get() 
            ];
            return view('dashboard.admin', compact('data'));
        }

        // 2. DATA UNTUK MANAJER (Fokus ke Produksi)
        if ($role == 'manager') {
            $data = [
                'active_schedules' => ProductionSchedule::where('status', 'running')->count(),
                'total_production_month' => ProductionReport::whereMonth('production_date', date('m'))->sum('quantity_result'),
                'total_reject_month' => ProductionReport::whereMonth('production_date', date('m'))->sum('quantity_reject'),
                // Ambil jadwal yang statusnya 'running'
                'current_schedules' => ProductionSchedule::with('product')->where('status', 'running')->get()
            ];
            return view('dashboard.manager', compact('data'));
        }

        // 3. DATA UNTUK STAFF (Fokus ke Stok & Gudang)
        if ($role == 'staff') {
            $data = [
                // Cari bahan yang stoknya di bawah 10 (Warning!)
                'low_stock_materials' => Material::where('stock', '<', 10)->get(),
                'total_materials' => Material::count(),
                'incoming_today' => \App\Models\MaterialTransaction::where('type', 'in')->whereDate('date', date('Y-m-d'))->count(),
            ];
            return view('dashboard.staff', compact('data'));
        }

        // 4. DATA UNTUK OPERATOR (Fokus ke Tugas Hari Ini)
        if ($role == 'operator') {
            $data = [
                // Tampilkan jadwal yang sedang berjalan
                'tasks' => ProductionSchedule::with('product')->where('status', 'running')->get(),
                'my_reports_today' => ProductionReport::where('user_id', Auth::id())->whereDate('production_date', date('Y-m-d'))->count()
            ];
            return view('dashboard.operator', compact('data'));
        }

        return view('dashboard');
    }
}