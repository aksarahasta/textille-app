<x-app-layout>
    <x-slot name="header">Overview</x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        
        <div class="md:col-span-2 bg-white rounded-xl shadow-sm p-6 border-t-4 border-textile-primary relative overflow-hidden">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Total Bahan Baku</h4>
                    <span class="text-4xl font-extrabold text-textile-primary">{{ $data['total_materials'] }}</span>
                    <span class="text-gray-400 text-sm ml-2">Jenis Item</span>
                </div>
                <div class="p-3 bg-textile-light rounded-lg text-textile-primary">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="mt-4 text-sm text-gray-600">
                Gudang saat ini menyimpan berbagai jenis kain dan pewarna.
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-textile-accent">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Produk Jadi</h4>
                    <span class="text-4xl font-extrabold text-gray-800">{{ $data['total_products'] }}</span>
                </div>
                <div class="p-3 bg-orange-100 rounded-lg text-orange-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-textile-secondary">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Supplier</h4>
                    <span class="text-4xl font-extrabold text-gray-800">{{ $data['total_suppliers'] }}</span>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-bold text-lg text-textile-primary mb-4 flex items-center">
                <span class="mr-2">📊</span> Aktivitas Gudang Terakhir
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase border-b border-gray-100">
                            <th class="pb-3 font-semibold">Tanggal</th>
                            <th class="pb-3 font-semibold">Barang</th>
                            <th class="pb-3 font-semibold text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach($data['recent_activities'] as $act)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="py-3 text-gray-600">{{ $act->date }}</td>
                            <td class="py-3 font-medium text-gray-800">{{ $act->material->name }}</td>
                            <td class="py-3 text-center">
                                @if($act->type == 'in')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Masuk</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Keluar</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       <div class="grid grid-rows-2 gap-6">
            
            <a href="{{ route('users.index') }}" class="bg-[#4E342E]  rounded-xl shadow-lg p-6 flex flex-col justify-center items-center text-white text-center hover:bg-[#5D4037] transition cursor-pointer group">
                <h3 class="text-2xl font-bold mb-2 group-hover:scale-110 transition-transform">Total Pengguna</h3>
                <p class="text-4xl font-extrabold">{{ $data['total_users'] }}</p>
                <span class="text-sm bg-white text-[#4E342E] px-3 py-1 rounded-full mt-3 font-bold">
                    ⚙️ Kelola Akun
                </span>
            </a>
            
            <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-l-8 border-[#8D6E63]">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Stok Bahan</h3>
                    <p class="text-gray-500 text-sm mt-1">Input barang baru.</p>
                </div>
                <a href="{{ route('materials.create') }}" class="bg-[#8D6E63] hover:bg-[#4E342E] text-white px-4 py-2 rounded-lg font-bold shadow transition text-sm">
                    + Input
                </a>
            </div>

        </div>
    </div>
</x-app-layout>