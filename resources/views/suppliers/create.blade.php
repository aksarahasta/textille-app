<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Supplier Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Supplier</label>
                            <input type="text" name="name" class="w-full border rounded px-3 py-2" required placeholder="PT. Tekstil Maju Jaya">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">No. Telepon</label>
                            <input type="text" name="phone" class="w-full border rounded px-3 py-2" required placeholder="0812...">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email (Opsional)</label>
                            <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="contoh@email.com">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Lengkap</label>
                            <textarea name="address" rows="3" class="w-full border rounded px-3 py-2" placeholder="Jl. Raya No. 123..."></textarea>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" style="background-color: #4E342E; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                                Simpan Supplier
                            </button>
                            <a href="{{ route('suppliers.index') }}" style="color: gray; text-decoration: underline;">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>