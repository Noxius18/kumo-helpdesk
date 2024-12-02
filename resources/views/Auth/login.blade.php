<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen">
    <!-- component -->
    <div class="min-h-screen flex items-center justify-center w-full">
        <div class="bg-kumoBlue-100 shadow-md rounded-lg px-8 py-6 max-w-md">
            <img src="{{ asset('images/logo/logo1.png') }}" alt="Logo" class="mb-4">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-300 focus:border-blue-300" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-blue-300 focus:border-blue-300" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Login</button>
            </form>
        </div>
    </div>
</body>
</html>