<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Transaksi Bahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Pilih Bahan Baku</label>
                            <select name="material_id" class="w-full border rounded px-3 py-2 bg-white" required>
                                <option value="">-- Pilih Bahan --</option>
                                @foreach($materials as $material)
                                    <option value="{{ $material->id }}">
                                        {{ $material->name }} (Sisa Stok: {{ $material->stock }} {{ $material->unit }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jenis Transaksi</label>
                            <select name="type" class="w-full border rounded px-3 py-2 bg-white" required>
                                <option value="in">🔵 Barang Masuk (Dari Supplier)</option>
                                <option value="out">🔴 Barang Keluar (Ke Produksi)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jumlah</label>
                            <input type="number" name="quantity" class="w-full border rounded px-3 py-2" placeholder="0" min="1" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Tanggal Transaksi</label>
                            <input type="date" name="date" class="w-full border rounded px-3 py-2" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Keterangan (Opsional)</label>
                            <textarea name="description" class="w-full border rounded px-3 py-2" placeholder="Contoh: Dari Supplier PT. Maju / Untuk Produksi Batch 1"></textarea>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <button type="submit" style="background-color: #4E342E; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                                Simpan Transaksi
                            </button>
                            <a href="{{ route('transactions.index') }}" style="color: gray; text-decoration: underline; margin-top: 10px;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>