<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tambah User Baru</h2></x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Email (Untuk Login)</label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Hak Akses (Role)</label>
                        <select name="role" class="w-full border rounded px-3 py-2 bg-yellow-50 font-bold">
                            <option value="staff">Staff Gudang</option>
                            <option value="operator">Operator Produksi</option>
                            <option value="manager">Manajer Produksi</option>
                            <option value="admin">Admin Pabrik</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Password</label>
                        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-bold mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold">Simpan User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>