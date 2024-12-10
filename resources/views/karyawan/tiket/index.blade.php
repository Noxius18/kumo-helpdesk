@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Daftar Tiket Kamu</h3>

    <!-- Tabel Tiket -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900">ID Tiket</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Kategori</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Prioritas</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Tanggal Lapor</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $tiket)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $tiket->tiket_id }}</td>
                        <td class="px-6 py-4">{{ $tiket->kategori->kategori }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-white text-xs font-semibold 
                                {{ $tiket->prioritas == 'High' ? 'bg-red-500' : ($tiket->prioritas == 'Medium' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                {{ $tiket->prioritas }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                {{ $tiket->status == 'Open' ? 'bg-blue-500' : ($tiket->status == 'Progress' ? 'bg-orange-500' : ($tiket->status == 'Resolved' ? 'bg-green-500' : 'bg-gray-500')) }}">
                                {{ str_replace('_', ' ', $tiket->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $tiket->tanggal_lapor->format('d-m-Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('karyawan.tiket.detail', $tiket->tiket_id) }}" 
                               class="text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Belum ada tiket yang dibuat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
