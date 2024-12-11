@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header -->
    <div class="flex justify-between items-center py-4">
        <h1 class="text-2xl font-bold text-gray-700">Daftar Departemen</h1>
        <button 
            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
            onclick="document.getElementById('modalTambah').classList.remove('hidden')">
            Tambah Departemen
        </button>
    </div>

    <!-- Tabel Departemen -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 font-medium text-gray-900">No</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Kode Departemen</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Nama Departemen</th>
                    <th class="px-6 py-4 font-medium text-gray-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departemen as $row)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $row->departemen_id }}</td>
                    <td class="px-6 py-4">{{ $row->nama_departemen }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.departemen.hapus', $row->departemen_id) }}" method="POST" class="form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline delete-button">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Departemen -->
<div id="modalTambah" tabindex="-1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Tambah Departemen Baru</h2>
        <form action="{{ route('admin.departemen.tambah') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Input Nama Departemen -->
            <div>
                <label for="nama_departemen" class="block text-sm font-medium text-gray-700">Nama Departemen</label>
                <input 
                    type="text" 
                    name="nama_departemen" 
                    id="nama_departemen" 
                    maxlength="25"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>
            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-2">
                <button type="button" 
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"
                    onclick="document.getElementById('modalTambah').classList.add('hidden')">
                    Batal
                </button>
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection