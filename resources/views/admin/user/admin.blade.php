@extends('layouts.app')
@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">{{ $title }}</h3>

    <!-- Tombol Tambah Pengguna -->
    <div class="flex justify-end mb-4">
        <a href="/admin/users/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Tambah Pengguna
        </a>
    </div>

    <!-- Tabel Data Pengguna -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-50 text-left text-sm text-gray-600">
            <!-- Header Tabel -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-4 font-medium">No</th>
                    <th class="px-6 py-4 font-medium">Nama</th>
                    <th class="px-6 py-4 font-medium">Email</th>
                    <th class="px-6 py-4 font-medium">Role</th>
                    <th class="px-6 py-4 font-medium">Departemen</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <!-- Body Tabel -->
            <tbody>
                <!-- Baris Genap -->
                @foreach ($admin as $index => $user)
                    <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-kumoWhite-100' }} hover: bg-gray-200">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $user->nama }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->role->role }}</td>
                        <td class="px-6 py-4">{{ $user->departemen->nama_departemen ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="/admin/users/1" class="text-blue-500 hover:underline">Detail</a>
                                <a href="/admin/users/1/edit" class="text-yellow-500 hover:underline">Edit</a>
                                <form action="/admin/users/1" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection