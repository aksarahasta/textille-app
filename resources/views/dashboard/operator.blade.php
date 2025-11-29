<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Halo, Operator!</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-lg font-bold mb-2">Target Pekerjaan Hari Ini</h3>
                @forelse($data['tasks'] as $task)
                    <div class="border p-4 rounded mb-2 bg-blue-50">
                        <span class="font-bold text-lg text-blue-800">{{ $task->product->name }}</span>
                        <div class="text-sm text-gray-600">Target: {{ $task->planned_quantity }} Pcs | Deadline: {{ $task->end_date }}</div>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada jadwal produksi aktif hari ini.</p>
                @endforelse
            </div>

            <div class="text-center">
                <a href="{{ route('production-reports.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white py-4 px-8 rounded-lg font-bold text-xl shadow-lg">
                    ✅ Lapor Hasil Produksi
                </a>
                <p class="mt-4 text-gray-500">Anda sudah melapor {{ $data['my_reports_today'] }} kali hari ini.</p>
            </div>

        </div>
    </div>
</x-app-layout>