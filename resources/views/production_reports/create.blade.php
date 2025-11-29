<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lapor Hasil Produksi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('production-reports.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Produk yang Dikerjakan</label>
                            <select name="product_id" class="w-full border rounded px-3 py-2 bg-white" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2 text-green-700">Jumlah Hasil Bagus (Pcs)</label>
                            <input type="number" name="quantity_result" class="w-full border border-green-500 rounded px-3 py-2" placeholder="0" required>
                            <p class="text-xs text-gray-500">*Akan otomatis menambah stok produk.</p>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2 text-red-700">Jumlah Reject / Rusak (Pcs)</label>
                            <input type="number" name="quantity_reject" class="w-full border border-red-500 rounded px-3 py-2" value="0">
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Tanggal Produksi</label>
                            <input type="date" name="production_date" class="w-full border rounded px-3 py-2" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Catatan (Masalah Mesin, dll)</label>
                            <textarea name="notes" class="w-full border rounded px-3 py-2"></textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold;">Kirim Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>