@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <!-- Dashboard Admin -->
        @if (Auth::user()->role->role === 'Admin')
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

        <!-- Dashboard Teknisi -->
        @elseif (Auth::user()->role->role === 'Teknisi')
            <div class="bg-gray-100 min-h-screen p-6">
                <div class="container mx-auto">
                    <!-- Header Dashboard -->
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Dashboard Teknisi</h2>
                
                    <!-- Statistik Tiket -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-700">Total tiket yang kamu kerjakan</h3>
                            <p class="text-2xl font-bold text-blue-500 mt-2">{{ $totalTiket }}</p>
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
        
        <!-- Dashboard Karyawan -->
        @elseif (Auth::user()->role->role === 'Karyawan')
            <div class="bg-gray-100 min-h-screen p-6">
                <div class="container mx-auto">
                    <!-- Header Dashboard -->
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-semibold text-gray-700">Dashboard Karyawan</h1>
                        <p class="text-sm text-gray-500">Halo, {{ $nama }}!</p>
                    </div>
                
                    <!-- Ringkasan Tiket -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <!-- Tiket yang Dibuka -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tiket yang Dibuka</h3>
                            <p class="text-3xl font-bold text-blue-500">{{ $openTicket }}</p>
                        </div>
                    
                        <!-- Tiket yang Sedang Diproses -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tiket Sedang Diproses</h3>
                            <p class="text-3xl font-bold text-yellow-500">{{ $progressTicket }}</p>
                        </div>
                    
                        <!-- Tiket yang Selesai -->
                        <div class="bg-white shadow rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tiket Selesai</h3>
                            <p class="text-3xl font-bold text-green-500">{{ $resolvedTicket }}</p>
                        </div>
                    </div>
                
                    <!-- Daftar Tiket -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Tiket Saya</h2>
                    
                        <!-- Jika Tiket Kosong -->
                        @if ($tickets->isEmpty())
                            <p class="text-gray-500 text-center">Belum ada tiket yang dilaporkan.</p>
                        @else
                            <!-- Tabel Tiket -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 border-b">Tiket ID </th>
                                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 border-b">Kategori</th>
                                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 border-b">Status</th>
                                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 border-b">Tanggal Lapor</th>
                                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900 border-b">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                                                <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $ticket->tiket_id }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $ticket->kategori->kategori }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $ticket->status }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $ticket->tanggal_lapor->format('d-M-Y') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700 border-b">
                                                    <a href="{{ route('karyawan.tiket.show', $ticket->tiket_id) }}" class="text-blue-500 hover:underline">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif  
    @endif
@endsection