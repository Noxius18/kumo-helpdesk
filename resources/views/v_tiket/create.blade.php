@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Buat Tiket Baru</h3>

    <!-- Form Buat Tiket -->
    <form action="{{ route('karyawan.tiket.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Kategori -->
        <div>
            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select id="kategori_id" name="kategori_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->kategori_id }}">{{ $item->kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                      placeholder="Tuliskan detail masalah atau permintaan Anda...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Prioritas -->
        <div>
            <label for="prioritas" class="block text-sm font-medium text-gray-700">Prioritas</label>
            <select id="prioritas" name="prioritas" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">Pilih Prioritas</option>
                <option value="Low" {{ old('prioritas') == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ old('prioritas') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ old('prioritas') == 'High' ? 'selected' : '' }}>High</option>
            </select>
            @error('prioritas')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" id="status" name="status" value="Open" readonly
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-700 sm:text-sm">
        </div>
        

        <!-- Lampiran -->
        <div>
            <label for="files" class="block text-sm font-medium text-gray-700">Lampiran</label>
            <input type="file" id="files" name="files[]" multiple
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            <span class="text-gray-500 text-sm">* Format gambar (jpeg, png, bmp) dengan ukuran maksimal 2MB</span>
            @error('files.*')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Simpan Tiket
            </button>
        </div>
    </form>
</div>
@endsection