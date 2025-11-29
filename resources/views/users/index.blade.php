<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Kelola Pengguna Sistem</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">+ Tambah User Baru</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3">Nama</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Role</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-bold">{{ $user->name }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 rounded text-xs font-bold uppercase 
                                        {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-700' : '' }}
                                        {{ $user->role == 'manager' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $user->role == 'operator' ? 'bg-orange-100 text-orange-700' : '' }}
                                        {{ $user->role == 'staff' ? 'bg-gray-100 text-gray-700' : '' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                               <td class="p-3 text-center flex justify-center space-x-2">
                                    @if($user->id !== Auth::id())
                                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-900 font-bold">
                                            Edit
                                        </a>
                                        
                                        <span class="text-gray-300">|</span>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?');">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900 font-bold">Hapus</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">(Akun Saya)</span>
                                    @endif
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