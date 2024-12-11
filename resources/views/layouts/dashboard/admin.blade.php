<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-700">Total Tiket</h3>
        <p class="mt-2 text-3xl font-bold text-blue-500">{{ $totalTiket }}</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-700">Tiket Baru</h3>
        <p class="mt-2 text-3xl font-bold text-green-500">{{ $openTiket }}</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-700">Tiket Sedang Dikerjakan</h3>
        <p class="mt-2 text-3xl font-bold text-yellow-500">{{ $progresTiket }}</p>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-700">Total Pengguna</h3>
        <p class="mt-2 text-3xl font-bold text-red-500">{{ $totalUser }}</p>
    </div>
</div>