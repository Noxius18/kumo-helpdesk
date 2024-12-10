@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Daftar Semua Tiket</h3>

    <!-- Tabel Tiket -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900">ID Tiket</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Pelapor</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Kategori</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Prioritas</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Teknisi</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Status</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Tanggal Lapor</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tikets as $tiket)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $tiket->tiket_id }}</td>
                        <td class="px-6 py-4">{{ $tiket->user->nama }}</td>
                        <td class="px-6 py-4">{{ $tiket->kategori->kategori }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-white text-xs font-semibold 
                                {{ $tiket->prioritas == 'High' ? 'bg-red-500' : ($tiket->prioritas == 'Medium' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                {{ $tiket->prioritas }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $tiket->teknisi_id ? $tiket->teknisi->nama : '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                {{ $tiket->status == 'Open' ? 'bg-blue-500' : ($tiket->status == 'In_Progress' ? 'bg-orange-500' : ($tiket->status == 'Resolved' ? 'bg-green-500' : 'bg-gray-500')) }}">
                                {{ str_replace('_', ' ', $tiket->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $tiket->tanggal_lapor->format('d-m-Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.tiket.show', $tiket->tiket_id) }}" 
                                   class="text-blue-500 hover:underline">Detail</a>
                                @if ($tiket->status == 'Open')
                                    <button type="button" 
                                            data-modal-target="teruskanModal{{ $tiket->tiket_id }}" 
                                            class="text-yellow-500 hover:underline open-modal">Teruskan</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada tiket yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Teruskan -->
@foreach ($tikets as $tiket)
    @if ($tiket->status == 'Open')
    <div id="teruskanModal{{ $tiket->tiket_id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h3 class="text-lg font-semibold mb-4">Teruskan Tiket ke Teknisi</h3>
            <form action="{{ route('admin.tiket.teruskan', $tiket->tiket_id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="teknisi" class="block text-sm font-medium text-gray-700">Pilih Teknisi</label>
                    <select id="teknisi" name="teknisi_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">Pilih Teknisi</option>
                        @foreach ($teknisis as $teknisi)
                            <option value="{{ $teknisi->user_id }}">{{ $teknisi->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" data-dismiss="modal" data-target="teruskanModal{{ $tiket->tiket_id }}" 
                            class="text-gray-500 hover:underline">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
@endforeach
@endsection