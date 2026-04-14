<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gereja Absensi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        body {
            background: linear-gradient(180deg, #eef2ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        /* Sidebar warna solid gelap: slate-900 (bukan hitam) */
        .sidebar {
            background: #0f172a;  /* slate-900: warna biru keabu-abuan gelap yang solid */
            box-shadow: 8px 0 30px rgba(0, 0, 0, 0.25);
        }
        .nav-item {
            transition: all 0.3s ease;
        }
        .nav-item:hover {
            background: rgba(255,255,255,0.1);
            transform: translateX(4px);
        }
        .nav-item.active {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .btn {
            border-radius: 10px;
            padding: 10px 16px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #7c3aed);
            color: #fff;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
        .alert {
            border-radius: 12px;
        }
        /* Tuning header sidebar agar menyatu dengan warna gelap solid */
        .sidebar-header {
            background-color: #0f172a; /* slate-900 solid */
            border-bottom: 1px solid #334155; /* slate-700 subtle */
        }
        /* Sedikit penyesuaian teks dan ikon di sidebar */
        .sidebar .text-white\/80 {
            color: rgba(255,255,255,0.75);
        }
        /* Hover dan active lebih kontras namun tetap elegan */
        .nav-item i, .nav-item span {
            transition: all 0.2s;
        }
        /* Tombol logout di sidebar */
        .logout-btn {
            background-color: #b91c1c; /* red-700 solid tapi lebih gelap */
            transition: all 0.2s;
        }
        .logout-btn:hover {
            background-color: #dc2626; /* red-600 */
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-slate-100 to-sky-50">
    <div class="flex min-h-screen">
        <div class="sidebar w-72 fixed inset-y-0 left-0 z-50 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <div class="flex flex-col h-full">
                <div class="sidebar-header flex items-center justify-center h-20 px-6">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-11 h-11 bg-white  bg-opacity-20 rounded-xl mr-3">
                            <i class="fas fa-church text-black text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-white">Gereja</h1>
                            <p class="text-xs text-white text-opacity-80">Manage Data System</p>
                        </div>
                    </div>
                </div>

                <nav class="flex-1 px-3 py-6 space-y-1">
                    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center px-4 py-3 text-white rounded-xl text-sm font-medium">
                        <i class="fas fa-tachometer-alt mr-3 w-5"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('jemaat.index') }}" class="nav-item {{ request()->routeIs('jemaat.*') ? 'active' : '' }} flex items-center px-4 py-3 text-white rounded-xl text-sm font-medium">
                        <i class="fas fa-users mr-3 w-5"></i>
                        <span>Data Jemaat</span>
                    </a>

                    <a href="{{ route('cabang.index') }}" class="nav-item {{ request()->routeIs('cabang.*') ? 'active' : '' }} flex items-center px-4 py-3 text-white rounded-xl text-sm font-medium">
                        <i class="fas fa-building mr-3 w-5"></i>
                        <span>Cabang Gereja</span>
                    </a>

                    <a href="{{ route('settings.index') }}" class="nav-item {{ request()->routeIs('settings.*') ? 'active' : '' }} flex items-center px-4 py-3 text-white rounded-xl text-sm font-medium">
                        <i class="fas fa-gear mr-3 w-5"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>

                <div class="p-4 border-t border-slate-700">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 bg-white bg-opacity-20 rounded-full mr-3">
                            <i class="fas fa-user text-black"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ Auth::user()->username }}</p>
                            <p class="text-xs text-white text-opacity-70">{{ Auth::user()->role }}</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn w-full flex items-center justify-center px-4 py-2 text-white bg-red-700 hover:bg-red-600 rounded-lg transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1 lg:ml-72">
            <div class="lg:hidden fixed top-4 left-4 z-40">
                <button id="mobile-menu-btn" class="bg-indigo-600 text-white p-3 rounded-xl shadow-lg">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="p-6 md:p-8">
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 alert shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-500"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 alert shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle mr-3 text-red-500"></i>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <div class="card p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.querySelector('.sidebar');

        mobileMenuBtn?.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });

        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });
    </script>
</body>
</html>