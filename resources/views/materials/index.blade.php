<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('materials.create') }}" 
                    style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                    class="mb-4 inline-block">
                    + Tambah Bahan Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Nama Bahan</th>
                                <th class="px-4 py-2 text-left">Satuan</th>
                                <th class="px-4 py-2 text-left">Stok Saat Ini</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $material)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-bold">{{ $material->name }}</td>
                                <td class="px-4 py-2">{{ $material->unit }}</td>
                                <td class="px-4 py-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">
                                        {{ $material->stock }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-center">
                                   <a href="{{ route('materials.edit', $material->id) }}" 
                                        class="text-yellow-600 hover:text-yellow-900 mr-2 font-bold">
                                        Edit
                                    </a>
                                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus bahan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold" style="background: none; border: none; cursor: pointer; text-decoration: underline;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>