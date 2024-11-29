<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Kumo Helpdesk</title>
</head>
<body class="bg-gray-100">
    <header class="bg-kumoBlue-100 text-white flex justify-between items-center p-4">
        <div class="flex items-center">
          <img alt="Kumo logo" class="mr-2" height="150" src="{{ asset('images/logo/logo1.png') }}" width="150"/>
        </div>
        <div>
          <span>Selamat Datang, {{ $user }}</span>
        </div>
    </header>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="bg-kumoBlue-100 text-white w-64 p-4 flex flex-col">
          <nav class="flex-1">
            <ul>
                @yield('sidebar')

              {{-- @foreach ($sidebar as $menu)
                <li class="mb-4">
                  <a class="flex items-center p-2 bg-blue-500 rounded" href="#">
                    <i class="fas fa-th-large mr-2"></i>
                    <span>Dashboard</span>
                  </a>
                </li>
              @endforeach --}}
              {{-- Nanti tinggal dicopy foreachnya ke tiap role page --}}
            </ul>
          </nav>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
            {{-- Isi Konten disini nanti --}}
        </main>
    </div>
</body>
</html>