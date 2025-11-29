<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Produk</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Nama Produk</label>
                            <input type="text" name="name" class="w-full border rounded px-3 py-2" required placeholder="Contoh: Kain Batik Tulis A">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Stok Awal</label>
                            <input type="number" name="stock" class="w-full border rounded px-3 py-2" value="0" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>