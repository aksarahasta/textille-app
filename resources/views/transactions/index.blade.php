<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Transaksi Gudang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4">
                <a href="{{ route('transactions.create') }}" 
                   style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                   class="inline-block">
                    + Catat Transaksi Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Bahan Baku</th>
                                <th class="px-4 py-2 text-center">Status</th>
                                <th class="px-4 py-2 text-center">Jumlah</th>
                                <th class="px-4 py-2 text-left">Petugas</th>
                                <th class="px-4 py-2 text-left">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $transaction->date }}</td>
                                <td class="px-4 py-2 font-bold">{{ $transaction->material->name }}</td>
                                <td class="px-4 py-2 text-center">
                                    @if($transaction->type == 'in')
                                        <span style="background-color: #dcfce7; color: #166534; padding: 2px 8px; border-radius: 4px; font-weight: bold;">Masuk</span>
                                    @else
                                        <span style="background-color: #fee2e2; color: #991b1b; padding: 2px 8px; border-radius: 4px; font-weight: bold;">Keluar</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center font-bold">
                                    {{ $transaction->quantity }} {{ $transaction->material->unit }}
                                </td>
                                <td class="px-4 py-2 text-gray-500">
                                    {{ $transaction->user->name ?? 'Sistem' }}
                                </td>
                                <td class="px-4 py-2 italic text-gray-500">
                                    {{ $transaction->description ?? '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Belum ada riwayat transaksi.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>