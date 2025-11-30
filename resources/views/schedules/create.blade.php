<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Jadwal Baru</h2></x-slot>
    <div class="py-12"><div class="max-w-4xl mx-auto sm:px-6"><div class="bg-white p-6 shadow sm:rounded-lg">
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-bold mb-2">Target Produk</label>
                <select name="product_id" class="w-full border rounded px-3 py-2">
                    @foreach($products as $p) <option value="{{ $p->id }}">{{ $p->name }}</option> @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div><label class="block font-bold mb-2">Tanggal Mulai</label><input type="date" name="start_date" class="w-full border rounded px-3 py-2" required></div>
                <div><label class="block font-bold mb-2">Target Selesai</label><input type="date" name="end_date" class="w-full border rounded px-3 py-2" required></div>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-2">Target Jumlah (Pcs)</label>
                <input type="number" name="planned_quantity" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-bold mb-2">Catatan</label>
                <textarea name="notes" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" style="background-color: #4E342E; color: white; padding: 10px 20px; rounded: 5px; font-weight: bold;">Simpan Jadwal</button>
        </form>
    </div></div></div>
</x-app-layout>