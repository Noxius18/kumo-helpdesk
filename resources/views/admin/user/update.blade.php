@extends('layouts.app')
@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">{{ $title }}</h3>

    <!-- Form Update Pengguna -->
    <form action="{{ route('admin.user.update', $user->user_id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" required
                   value="{{ old('nama', $user->nama) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
                   value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Kosongkan jika tidak ingin mengganti password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>

        <!-- Input Konfirmasi Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="Kosongkan jika tidak ingin mengganti password"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->role_id }}" {{ $user->role_id == $role->role_id ? 'selected' : '' }}>
                        {{ $role->role }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Departemen -->
        <div>
            <label for="departemen" class="block text-sm font-medium text-gray-700">Departemen</label>
            <select id="departemen" name="departemen_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">Pilih Departemen</option>
                @foreach ($departemen as $dept)
                    <option value="{{ $dept->departemen_id }}" {{ $user->departemen_id == $dept->departemen_id ? 'selected' : '' }}>
                        {{ $dept->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Spesialisasi -->
        <div id="spesialis-wrapper" class="{{ $user->spesialis_id ? '' : 'hidden' }}">
            <label for="spesialis" class="block text-sm font-medium text-gray-700">Spesialisasi</label>
            <select id="spesialis" name="spesialis_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">Pilih Spesialisasi</option>
                @foreach ($spesialis as $spec)
                    <option value="{{ $spec->spesialis_id }}" {{ $user->spesialis_id == $spec->spesialis_id ? 'selected' : '' }}>
                        {{ $spec->spesialis }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
