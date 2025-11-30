<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Bahan Baku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('materials.store') }}" method="POST">
                        @csrf <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Bahan</label>
                            <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Benang Wol" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Satuan (Unit)</label>
                            <input type="text" name="unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: kg, liter, meter" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Stok Awal</label>
                            <input type="number" name="stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="0" required>
                        </div>

                        <div class="flex items-center justify-between" style="margin-top: 20px;">
                            
                            <button type="submit" 
                                    style="background-color: #4E342E; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold;">
                                Simpan Data
                            </button>

                            <a href="{{ route('materials.index') }}" 
                               style="color: gray; text-decoration: underline; margin-left: 10px;">
                                Batal
                            </a>
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>