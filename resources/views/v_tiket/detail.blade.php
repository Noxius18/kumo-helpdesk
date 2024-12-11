@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <!-- Judul Halaman -->
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Detail Tiket: {{ $tiket->tiket_id }}</h3>

    <!-- Informasi Tiket -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kategori -->
        <div>
            <h4 class="text-sm font-medium text-gray-500">Kategori</h4>
            <p class="mt-1 text-gray-800">{{ $tiket->kategori->kategori }}</p>
        </div>

        <!-- Prioritas -->
        <div>
            <h4 class="text-sm font-medium text-gray-500">Prioritas</h4>
            <p class="mt-1 text-gray-800">{{ $tiket->prioritas }}</p>
        </div>

        <!-- Status -->
        <div>
            <h4 class="text-sm font-medium text-gray-500">Status</h4>
            <p class="mt-1 text-gray-800">
                <span class="px-2 py-1 rounded text-sm font-medium {{ $tiket->status == 'Open' ? 'bg-green-100 text-green-800' : ($tiket->status == 'Progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                    {{ $tiket->status }}
                </span>
            </p>
        </div>

        <!-- Tanggal Lapor -->
        <div>
            <h4 class="text-sm font-medium text-gray-500">Tanggal Lapor</h4>
            <p class="mt-1 text-gray-800">{{ \Carbon\Carbon::parse($tiket->tanggal_lapor)->format('d M Y H:i') }}</p>
        </div>

        <!-- Tanggal Selesai -->
        @if($tiket->tanggal_selesai)
            <div>
                <h4 class="text-sm font-medium text-gray-500">Tanggal Selesai</h4>
                <p class="mt-1 text-gray-800">{{ \Carbon\Carbon::parse($tiket->tanggal_selesai)->format('d M Y H:i') }}</p>
            </div>
        @endif

        <!-- Teknisi -->
        @if($tiket->teknisi)
            <div>
                <h4 class="text-sm font-medium text-gray-500">Teknisi</h4>
                <p class="mt-1 text-gray-800">{{ $tiket->teknisi->nama }}</p>
            </div>
        @endif
    </div>

    <!-- Deskripsi -->
    <div class="mt-6">
        <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
        <p class="mt-1 text-gray-800">{{ $tiket->deskripsi }}</p>
    </div>

    <!-- Lampiran -->
    @if($tiket->foto && $tiket->foto->isNotEmpty())
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-500">Lampiran</h4>
            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($tiket->foto as $file)
                    <a href="{{ asset($file->nama_path . '/' . $file->nama_file) }}" target="_blank" class="block">
                        <img src="{{ asset($file->nama_path . '/' . $file->nama_file) }}" alt="Lampiran" class="rounded-lg shadow">
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @if($tiket->note && $tiket->note->isNotEmpty())
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-500">Riwayat Catatan</h4>
            <ul class="mt-2 space-y-4">
                @foreach($tiket->note as $note)
                    <li class="bg-gray-50 p-4 rounded-lg shadow">
                        <p class="text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($note->tanggal)->format('d M Y H:i') }} oleh {{ $note->user->nama }}
                        </p>
                        <p class="mt-1 text-gray-800">{{ $note->note }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Riwayat Catatan -->
    @if(Auth::user()->role->role === 'Teknisi')
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-500">Tambah Catatan</h4>
            <form action="{{ route('teknisi.note.tambah') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="tiket_id" value="{{ $tiket->tiket_id }}">
                <textarea name="note" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" placeholder="Masukkan catatan baru..." required></textarea>
                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan Catatan</button>
            </form>
        </div>
    @endif

    <div class="mt-6 flex justify-end space-x-4">
        @if (Auth::check())
            @if (Auth::user()->role->role === 'Teknisi' && $tiket->status === 'Progress')
                <form action="{{ route('teknisi.tiket.update', $tiket->tiket_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                        Selesaikan Tiket
                    </button>
                </form>
            @endif
    
            <a href="{{ 
                Auth::user()->role->role === 'Admin' ? route('admin.list-tiket') : 
                (Auth::user()->role->role === 'Teknisi' ? route('teknisi.list-tiket') : 
                route('karyawan.list-tiket')) 
            }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                Kembali
            </a>
        @endif
    </div>
</div>
@endsection