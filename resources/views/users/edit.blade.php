<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Edit Data Pengguna</h2></x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Jabatan / Role</label>
                        <select name="role" class="w-full border rounded px-3 py-2 bg-yellow-50 font-bold text-gray-700">
                            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff Gudang</option>
                            <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator Produksi</option>
                            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manajer Produksi</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin Pabrik</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">*Ubah role untuk menaikkan/menurunkan pangkat user.</p>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-bold">
                            Update Data
                        </button>
                        <a href="{{ route('users.index') }}" class="text-gray-500 underline">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>