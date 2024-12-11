<div class="bg-gray-100 min-h-screen p-6">
    <div class="container mx-auto">
        <!-- Header Dashboard -->
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Dashboard Teknisi</h2>
    
        <!-- Statistik Tiket -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Total tiket yang kamu kerjakan</h3>
                <p class="text-2xl font-bold text-blue-500 mt-2">{{ $resolvedTiket }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Tiket Dalam Progres</h3>
                <p class="text-2xl font-bold text-orange-500 mt-2">{{ $progressTiket }}</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700">Tiket Selesai</h3>
                <p class="text-2xl font-bold text-green-500 mt-2">{{ $resolvedTiket }}</p>
            </div>
        </div>
    
        <!-- Daftar Tiket yang Sedang Dalam Progres -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Tiket dalam Progres</h3>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                    <thead class="bg-gray-50">
                        @if ($tickets->isEmpty())
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada tiket dalam progres.
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th class="px-6 py-4 font-medium text-gray-900">ID Tiket</th>
                            <th class="px-6 py-4 font-medium text-gray-900">Pelapor</th>
                            <th class="px-6 py-4 font-medium text-gray-900">Kategori</th>
                            <th class="px-6 py-4 font-medium text-gray-900">Prioritas</th>
                            <th class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $ticket->tiket_id }}</td>
                                <td class="px-6 py-4">{{ $ticket->user->nama }}</td>
                                <td class="px-6 py-4">{{ $ticket->kategori->kategori }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-white text-xs font-semibold 
                                        {{ $ticket->prioritas == 'High' ? 'bg-red-500' : ($ticket->prioritas == 'Medium' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                        {{ $ticket->prioritas }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/teknisi/tiket/detail/TK123" class="text-blue-500 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>