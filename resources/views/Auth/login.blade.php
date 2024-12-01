<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-kumoBlue-100 flex flex-col items-center justify-center min-h-screen">
    <header class="w-full bg-blue-600 p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="Kumo logo" class="mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/BwNrtgmz4qKMEpCq2pAP4XXQnfdFDDR4ofpAYfe2hexxRKxeE.jpg" width="30"/>
            <span class="text-white text-lg font-bold">kumo</span>
            <span class="text-white text-sm">helpdesk.</span>
        </div>
        <a class="text-white text-sm" href="#">Kontak Kami</a>
    </header>
    <main class="bg-blue-600 rounded-lg p-8 mt-8 w-full max-w-md">
        <div class="flex flex-col items-center mb-6">
            <img alt="Cloud logo" class="mb-4" height="50" src="https://storage.googleapis.com/a1aa/image/PLhdKLz7DRobCl6UY4Q2c5Xu6l1ZFvebrlf0zDnxQU0MSJ2TA.jpg" width="50"/>
            <h1 class="text-white text-2xl font-bold">kumo</h1>
            <p class="text-white text-sm">helpdesk.</p>
        </div>
        <p class="text-white text-center mb-6">Silahkan masukkan email &amp; password Anda.</p>
        <form class="space-y-4" action="/login" method="POST"> <!-- Tambahkan action dan method -->
            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
            <input class="w-full p-3 rounded-full bg-blue-200 text-gray-700 focus:outline-none" placeholder="Email" type="email" name="email" required/> <!-- Tambahkan name dan required -->
            <input class="w-full p-3 rounded-full bg-blue-200 text-gray-700 focus:outline-none" placeholder="Password" type="password" name="password" required/> <!-- Tambahkan name dan required -->
            <div class="text-right">
                <a class="text-white text-sm" href="#">Lupa password?</a>
            </div>
            <button class="w-full p-3 rounded-full bg-blue-200 text-gray-700 font-bold" type="submit">LOGIN</button>
        </form>
    </main>
</body>
</html>