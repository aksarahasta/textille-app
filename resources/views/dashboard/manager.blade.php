<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Dashboard Manajer Produksi</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 mb-2">Jadwal Sedang Jalan</div>
                    <div class="text-4xl font-bold text-blue-600">{{ $data['active_schedules'] }}</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 mb-2">Produksi Bulan Ini (Pcs)</div>
                    <div class="text-4xl font-bold text-green-600">{{ $data['total_production_month'] }}</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-gray-500 mb-2">Total Reject (Bulan Ini)</div>
                    <div class="text-4xl font-bold text-red-600">{{ $data['total_reject_month'] }}</div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Monitoring Proses Produksi</h3>
                @if(count($data['current_schedules']) > 0)
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 text-left">Produk</th>
                                <th class="p-3 text-center">Target</th>
                                <th class="p-3 text-center">Deadline</th>
                                <th class="p-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['current_schedules'] as $sched)
                            <tr class="border-b">
                                <td class="p-3 font-bold">{{ $sched->product->name }}</td>
                                <td class="p-3 text-center">{{ $sched->planned_quantity }}</td>
                                <td class="p-3 text-center text-red-600">{{ $sched->end_date }}</td>
                                <td class="p-3 text-center"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Sedang Jalan</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 text-center py-4">Tidak ada produksi yang sedang berjalan.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>