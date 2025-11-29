<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Status Jadwal</h2></x-slot>
    <div class="py-12"><div class="max-w-4xl mx-auto sm:px-6"><div class="bg-white p-6 shadow sm:rounded-lg">
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf @method('PUT')
            
            <input type="hidden" name="product_id" value="{{ $schedule->product_id }}">
            <input type="hidden" name="start_date" value="{{ $schedule->start_date }}">
            <input type="hidden" name="end_date" value="{{ $schedule->end_date }}">
            <input type="hidden" name="planned_quantity" value="{{ $schedule->planned_quantity }}">

            <div class="mb-4">
                <h3 class="font-bold text-lg">Produk: {{ $schedule->product->name }} ({{ $schedule->planned_quantity }} Pcs)</h3>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Update Status Pengerjaan</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="planned" {{ $schedule->status == 'planned' ? 'selected' : '' }}>Direncanakan</option>
                    <option value="running" {{ $schedule->status == 'running' ? 'selected' : '' }}>Sedang Berjalan</option>
                    <option value="completed" {{ $schedule->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="canceled" {{ $schedule->status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-2">Catatan Tambahan</label>
                <textarea name="notes" class="w-full border rounded px-3 py-2">{{ $schedule->notes }}</textarea>
            </div>
            <button type="submit" style="background-color: orange; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold;">Update Status</button>
        </form>
    </div></div></div>
</x-app-layout>