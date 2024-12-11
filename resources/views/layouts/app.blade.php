<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('images/logo/logo1.ico') }}" type="image/x-icon">
    <link href="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('layouts/styles.css') }}">
</head>
<body class="bg-kumoWhite-100 font-varela">

  <div class="flex flex-col h-screen">
    <!-- Navbar -->
    <nav class="bg-kumoBlue-100 text-white p-4 flex justify-between items-center">
      <div class="flex items-center">
          <img alt="Kumo logo" class="mr-2" src="{{ asset('images/logo/logo1.png') }}" width="15%" />
      </div>
      <div class="flex items-center">
          @if (Auth::check())
              <!-- Notifikasi Dropdown -->
              <div class="relative ml-4">
                  <button class="relative flex items-center focus:outline-none" onclick="toggleDropdown('notificationDropdown')">
                      <i class="fas fa-bell text-xl"></i>
                      @if (Auth::user()->unreadNotifications->count() > 0)
                          <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full px-1.5 py-0.5">
                              {{ Auth::user()->unreadNotifications->count() }}
                          </span>
                      @endif
                  </button>
                  <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white text-gray-700 shadow-lg rounded-md z-50">
                      <div class="p-4 font-bold text-sm text-gray-900 border-b">
                          Notifikasi
                      </div>
                      <ul class="max-h-60 overflow-y-auto">
                          @forelse (Auth::user()->unreadNotifications as $notification)
                              <li class="p-2 hover:bg-gray-100 border-b">
                                  <p class="text-sm font-medium">{{ $notification->data['message'] }}</p>
                                  <p class="text-xs text-gray-500">
                                      {{ $notification->created_at->diffForHumans() }}
                                  </p>
                                  @if (isset($notification->data['tiket']['tiket_id']))
                                      <p class="text-xs text-gray-500">
                                          Tiket ID: {{ $notification->data['tiket']['tiket_id'] }}
                                      </p>
                                  @endif
                              </li>
                          @empty
                              <li class="p-4 text-sm text-gray-500">Tidak ada notifikasi.</li>
                          @endforelse
                      </ul>
                      <div class="text-center p-2">
                          <form action="{{ route('notifikasi.baca') }}" method="POST">
                              @csrf
                              <button type="submit" class="text-blue-600 text-sm hover:underline">Tandai semua sebagai dibaca</button>
                          </form>
                      </div>
                  </div>
              </div>
  
              <!-- Tombol Logout -->
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
                        <li><a href="{{ route('admin.list-tiket') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-list mr-2"></i>Tiket</a></li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center" onclick="toggleSubMenu('dropdownUser')">
                            <i class="fas fa-users mr-2"></i>Users
                            <i class="fas fa-chevron-down ml-auto"></i>
                          </a>
                          <ul id="dropdownUser" class="submenu space-y-2 pl-4">
                            <li><a href="{{ route('admin.user.create') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-solid fa-user-plus mr-2"></i>Tambah User</a></li>
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
                        <li><a href="{{ route('dashboard.karyawan') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-th-large mr-2"></i>Dashboard</a></li>
                        <li><a href="{{  route('karyawan.list-tiket') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-list mr-2"></i>List Tiket</a></li>
                        <li><a href="{{ route('karyawan.tiket.create') }}" class="block px-4 py-2 hover:bg-kumoBlue-300 rounded flex items-center"><i class="fas fa-pen mr-2"></i>Buat Tiket</a></li>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

  {{-- Sweetalert 2 --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: '{{ session('success') }}',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#28A745'
        });
      @endif

      @if(session('error'))
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: '{{ session('error') }}',
          confirmButtonText: 'Oke',
          confirmButtonColor: '#DC3545'
        });
      @endif
    })
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
  </script>

  {{-- Script Modal --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalButtons = document.querySelectorAll('.open-modal');
        openModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-target');
                openModal(modalId);
            });
        });

        const cancelButtons = document.querySelectorAll('[data-dismiss="modal"]');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modalId = this.getAttribute('data-target');
                closeModal(modalId);
            });
        });
    });

    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        }
    }
  </script>

  {{-- Script untuk dropdown Notifikasi --}}
  <script>
    function toggleDropdown(id) {
      const dropdown = document.getElementById(id);
      if(dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
      }
      else {
        dropdown.classList.add('hidden');
      }
    }
  </script>

</body>
</html>