@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Daftar Catatan Kamu</h3>

    <!-- Tabel Catatan -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900">ID Catatan</th>
                    <th class="px-6 py-4 font-medium text-gray-900">ID Tiket</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Tanggal</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $note->note_id }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('teknisi.tiket.detail', $note->tiket_id) }}" class="text-blue-500 hover:underline">
                                {{ $note->tiket_id }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($note->tanggal)->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $note->note }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Belum ada catatan yang dibuat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $notes->links() }}
        </div>
    </div>
</div>
@endsection
