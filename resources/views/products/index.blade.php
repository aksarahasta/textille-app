<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk Jadi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('products.create') }}" 
                   style="background-color: #4E342E; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                   class="inline-block">
                    + Tambah Produk Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Nama Produk</th>
                                <th class="px-4 py-2 text-left">Stok Ready</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-bold">{{ $product->name }}</td>
                                <td class="px-4 py-2">
                                    <span style="background-color: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-weight: bold;">
                                        {{ $product->stock }} Pcs
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('products.edit', $product->id) }}" style="color: #d97706; margin-right: 10px; font-weight: bold;">Edit</a>
                                    
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus produk ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer; font-weight: bold;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-4">Belum ada data produk.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>