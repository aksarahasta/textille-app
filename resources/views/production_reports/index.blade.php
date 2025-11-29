<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Riwayat Produksi Harian</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('production-reports.create') }}" 
                   style="background-color: blue; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold; text-decoration: none;"
                   class="inline-block">+ Lapor Produksi Baru</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Produk</th>
                                <th class="px-4 py-2 text-center">Hasil Bagus</th>
                                <th class="px-4 py-2 text-center">Reject</th>
                                <th class="px-4 py-2 text-left">Operator</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $report->production_date }}</td>
                                <td class="px-4 py-2 font-bold">{{ $report->product->name }}</td>
                                <td class="px-4 py-2 text-center text-green-700 font-bold">{{ $report->quantity_result }}</td>
                                <td class="px-4 py-2 text-center text-red-700">{{ $report->quantity_reject }}</td>
                                <td class="px-4 py-2">{{ $report->user->name }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center py-4">Belum ada laporan produksi.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>