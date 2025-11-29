<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Jadwal Produksi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('schedules.create') }}" style="background-color: blue; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold; text-decoration: none;" class="inline-block">+ Buat Jadwal Baru</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Produk</th>
                                <th class="px-4 py-2 text-center">Target</th>
                                <th class="px-4 py-2 text-center">Periode</th>
                                <th class="px-4 py-2 text-center">Status</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $sched)
                            <tr class="border-b">
                                <td class="px-4 py-2 font-bold">{{ $sched->product->name }}</td>
                                <td class="px-4 py-2 text-center">{{ $sched->planned_quantity }} Pcs</td>
                                <td class="px-4 py-2 text-center text-sm">
                                    {{ $sched->start_date }} <br> s/d <br> {{ $sched->end_date }}
                                </td>
                                <td class="px-4 py-2 text-center">
                                    @if($sched->status == 'planned')
                                        <span class="bg-gray-200 text-gray-800 px-2 rounded">Direncanakan</span>
                                    @elseif($sched->status == 'running')
                                        <span class="bg-blue-200 text-blue-800 px-2 rounded">Sedang Jalan</span>
                                    @elseif($sched->status == 'completed')
                                        <span class="bg-green-200 text-green-800 px-2 rounded">Selesai</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-2 rounded">Batal</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('schedules.edit', $sched->id) }}" style="color: orange; font-weight: bold;">Update Status</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center py-4">Belum ada jadwal.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>