@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal p-4 bg-white shadow rounded-lg" 
                  action="{{ route('admin.laporan.cetak') }}" method="post" target="_blank">
                @csrf
                <div class="card-body">
                    <h4 class="card-title text-xl font-semibold mb-4 text-gray-700">{{ $title }}</h4>
                    <div class="form-group mb-4">
                        <label for="tanggal_awal" class="block text-gray-600 mb-2">Tanggal Awal</label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" 
                               value="{{ old('tanggal_awal') }}" 
                               class="form-input border-gray-300 rounded-lg w-full @error('tanggal_awal') border-red-500 @enderror">
                        @error('tanggal_awal')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-6">
                        <label for="tanggal_akhir" class="block text-gray-600 mb-2">Tanggal Akhir</label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" 
                               value="{{ old('tanggal_akhir') }}" 
                               class="form-input border-gray-300 rounded-lg w-full @error('tanggal_akhir') border-red-500 @enderror">
                        @error('tanggal_akhir')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition ease-in-out">
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
