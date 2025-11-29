<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Area Staff Gudang</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(count($data['low_stock_materials']) > 0)
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p class="font-bold">Perhatian! Stok Menipis:</p>
                <ul class="list-disc ml-5 mt-2">
                    @foreach($data['low_stock_materials'] as $mat)
                        <li>{{ $mat->name }} (Sisa: {{ $mat->stock }} {{ $mat->unit }}) - Segera Order Supplier!</li>
                    @endforeach
                </ul>
            </div>
            @else
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                <p class="font-bold">Aman!</p>
                <p>Semua stok bahan baku dalam kondisi aman.</p>
            </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('transactions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-center py-8 rounded-lg shadow text-xl font-bold">
                    📝 Catat Barang Masuk / Keluar
                </a>
                <a href="{{ route('materials.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white text-center py-8 rounded-lg shadow text-xl font-bold">
                    📦 Cek Semua Stok
                </a>
            </div>

        </div>
    </div>
</x-app-layout>