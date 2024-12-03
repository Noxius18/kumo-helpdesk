<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-6">Tambah Tiket</h1>
        <form>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" id="kategori" name="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="Software">
                </div>
                <div>
                    <label for="departemen" class="block text-sm font-medium text-gray-700">Departemen</label>
                    <select id="departemen" name="departemen" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option selected>Akuntansi</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea id="konten" name="konten" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">Fitur absensi tidak berfungsi</textarea>
            </div>
            <div class="mb-6">
                <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran</label>
                <textarea id="lampiran" name="lampiran" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Masukkan lampiran Anda disini"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>