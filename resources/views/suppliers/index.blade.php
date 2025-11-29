<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('suppliers.create') }}" 
                   style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                   class="inline-block">
                    + Tambah Supplier
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Nama Supplier</th>
                                <th class="px-4 py-2 text-left">Alamat</th>
                                <th class="px-4 py-2 text-left">Telepon</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-bold">{{ $supplier->name }}</td>
                                <td class="px-4 py-2">{{ $supplier->address ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $supplier->phone ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $supplier->email ?? '-' }}</td>
                                <td class="px-4 py-2 text-center">
                                    
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" 
                                       style="color: #d97706; margin-right: 10px; font-weight: bold;">
                                       Edit
                                    </a>

                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus supplier ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer; font-weight: bold;">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Belum ada data supplier.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>