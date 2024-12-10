<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700">Total Tiket</h3>
            <p class="mt-2 text-3xl font-bold text-blue-500">120</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700">Tiket Baru</h3>
            <p class="mt-2 text-3xl font-bold text-green-500">15</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700">Tiket Sedang Dikerjakan</h3>
            <p class="mt-2 text-3xl font-bold text-yellow-500">25</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-700">Total Pengguna</h3>
            <p class="mt-2 text-3xl font-bold text-red-500">{{ $totalUser }}</p>
        </div>
    </div>
    @endsection
</body>
</html>