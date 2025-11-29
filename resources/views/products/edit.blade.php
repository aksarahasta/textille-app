<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Produk</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Nama Produk</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Stok</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" style="background-color: orange; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>