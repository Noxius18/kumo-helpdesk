<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('layouts/styles.css') }}">
</head>
<body class="bg-kumoWhite-100 font-varela">

  <div class="flex flex-col h-screen">
    <!-- Navbar -->
    <nav class="bg-kumoBlue-100 text-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="Kumo logo" class="mr-2" src="{{ asset('images/logo/logo1.png') }}" width="15%"/>
        </div>
        <div class="flex items-center">
            @if (Auth::check())
                <form action="/logout" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="text-white hover:bg-kumoBlue-300 px-4 py-2 rounded">Logout</button>
                </form>
            @endif
        </div>
    </nav>

    <div class="flex flex-1">
      <!-- Sidebar -->
      <div id="sidebar" class="w-64 bg-kumoBlue-200 text-white h-auto">
        <div class="p-4">
            <h2 class="text-lg font-bold">Menu</h2>
        </div>
        <nav class="mt-6">
            <ul class="space-y-2">
                @if (Auth::check())
                    @if (Auth::user()->role->role === 'Admin')
                        <li><a href="{{ route('dashboard.admin') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-th-large mr-2"></i>Dashboard</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-list mr-2"></i>Tiket</a></li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center" onclick="toggleSubMenu('dropdownUser')">
                            <i class="fas fa-users mr-2"></i>Users
                            <i class="fas fa-chevron-down ml-auto"></i>
                          </a>
                          <ul id="dropdownUser" class="submenu space-y-2 pl-4">
                            <li><a href="{{ route('admin.tambah-user') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-solid fa-user-plus mr-2"></i>Tambah User</a></li>
                            <li><a href="{{ route('dashboard.admin.data-admin') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-solid fa-user-tie mr-2"></i>Admin</a></li>
                            <li><a href="{{ route('dashboard.admin.data-karyawan') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-solid fa-user mr-2"></i>Karyawan</a></li>
                            <li><a href="{{ route('dashboard.admin.data-teknisi') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-solid fa-chalkboard-user mr-2"></i>Teknisi</a></li>
                          </ul>
                        </li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-chart-bar mr-2"></i>Reports</a></li>
                    @elseif (Auth::user()->role->role === 'Teknisi')
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-th-large mr-2"></i>Dashboard</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-list mr-2"></i>List Tiket</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-sticky-note mr-2"></i>Catatan Tiket</a></li>
                    @elseif (Auth::user()->role->role === 'Karyawan')
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-th-large mr-2"></i>Dashboard</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-list mr-2"></i>List Tiket</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-pen mr-2"></i>Buat Tiket</a></li>
                    @endif
                @endif
            </ul>
        </nav>
      </div>

      <!-- Content -->
      <div class="flex-1 p-6">
        @yield('content')
      </div>
      
    </div> 
  </div>

  {{-- Script JS --}}

  {{-- Script Toggle submenu --}}
  <script>
    function toggleSubMenu(id) {
      const submenu = document.getElementById(id);
      submenu.classList.toggle('open');
    }
  </script>

  {{-- Script untuk input Spesialis khusus teknisi --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const roleSelect = document.getElementById('role');
      const spesialisWrapper = document.getElementById('spesialis-wrapper');

      roleSelect.addEventListener('change', function() {
        const selectedRole = roleSelect.options[roleSelect.selectedIndex].text;
        if(selectedRole.toLowerCase() === 'teknisi') {
          spesialisWrapper.classList.remove('hidden');
        }
        else {
          spesialisWrapper.classList.add('hidden');
        }
      })
    })
  </script>

</body>
</html>