<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-700">{{ $title }}</h1>
            <p class="text-sm text-gray-500">
                Periode: {{ $tanggalAwal }} - {{ $tanggalAkhir }}
            </p>
        </div>
        <table class="table-auto w-full border-collapse border border-gray-300 text-left text-sm">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Kode Tiket</th>
                    <th class="border border-gray-300 px-4 py-2">Pelapor</th>
                    <th class="border border-gray-300 px-4 py-2">Kategori</th>
                    <th class="border border-gray-300 px-4 py-2">Teknisi</th>
                    <th class="border border-gray-300 px-4 py-2">Prioritas</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal Lapor</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetak as $row)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $row->tiket_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $row->user->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $row->kategori->kategori }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $row->teknisi ? $row->teknisi->nama : '-' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $row->prioritas }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($row->status == 'Open')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Open</span>
                        @elseif ($row->status == 'Progress')
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Progress</span>
                        @elseif ($row->status == 'Resolved')
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">Resolved</span>
                        @elseif ($row->status == 'Closed')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Closed</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $row->tanggal_lapor->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $row->tanggal_selesai ? $row->tanggal_selesai->format('d/m/Y') : '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            print();
        };
    </script>
</body>
</html>
