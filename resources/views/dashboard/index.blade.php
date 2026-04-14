@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header dengan warna gelap solid slate -->
    <div class="bg-gradient-to-br from-slate-800 via-slate-800 to-slate-900 rounded-3xl p-8 lg:p-12 text-white shadow-2xl overflow-hidden relative border border-slate-700">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="150" fill="white"/>
                <circle cx="900" cy="900" r="200" fill="white"/>
            </svg>
        </div>
        
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div class="flex-1">
                <p class="text-indigo-100 text-sm font-medium mb-2">Selamat datang kembali</p>
                <h1 class="text-3xl lg:text-5xl font-extrabold text-white mb-4">{{ Auth::user()->username }}</h1>
                <p class="text-indigo-50 text-base lg:text-lg leading-relaxed max-w-lg">Sistem pengaturan data jemaat dan cabang</p>
            </div>
            <div class="flex items-center gap-8">
                <div class="text-center lg:text-right">
                    <p class="text-indigo-100 text-sm mb-1">Total Jemaat</p>
                    <p class="text-4xl lg:text-5xl font-bold text-white">{{ \App\Models\Jemaat::count() }}</p>
                    <p class="text-indigo-100 text-xs mt-1">terdata</p>
                </div>
                <div class="hidden lg:flex items-center justify-center w-24 h-24 rounded-3xl bg-white/20 backdrop-blur-lg border border-white/30">
                    <i class="fas fa-church text-4xl text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Jemaat -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-200 group hover:border-indigo-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-slate-600 text-sm font-medium mb-2">Total Jemaat</p>
                    <p class="text-4xl font-bold text-slate-900">{{ \App\Models\Jemaat::count() }}</p>
                    <p class="text-emerald-600 text-xs font-medium mt-2">
                        <i class="fas fa-circle text-emerald-500 mr-1.5"></i>Anggota Aktif
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cabang Gereja -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-200 group hover:border-purple-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-slate-600 text-sm font-medium mb-2">Cabang Gereja</p>
                    <p class="text-4xl font-bold text-slate-900">{{ \App\Models\Cabang::count() }}</p>
                    <p class="text-purple-600 text-xs font-medium mt-2">
                        <i class="fas fa-location-dot mr-1.5"></i>Lokasi
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-church text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laki-laki -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-200 group hover:border-cyan-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-slate-600 text-sm font-medium mb-2">Jemaat Laki-laki</p>
                    <p class="text-4xl font-bold text-slate-900">{{ \App\Models\Jemaat::where('jenis_kelamin', 'Laki-laki')->count() }}</p>
                    <p class="text-cyan-600 text-xs font-medium mt-2">
                        <i class="fas fa-mars mr-1.5"></i>Pria
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mars text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perempuan -->
        <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-200 group hover:border-rose-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-slate-600 text-sm font-medium mb-2">Jemaat Perempuan</p>
                    <p class="text-4xl font-bold text-slate-900">{{ \App\Models\Jemaat::where('jenis_kelamin', 'Perempuan')->count() }}</p>
                    <p class="text-rose-600 text-xs font-medium mt-2">
                        <i class="fas fa-venus mr-1.5"></i>Wanita
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-rose-500 to-pink-500 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-venus text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 gap-5">
        <!-- Management Actions -->
        <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-slate-200">
            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-3">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600">
                    <i class="fas fa-tasks"></i>
                </span>
                Manajemen Data
            </h3>
            <div class="space-y-3">
                <a href="{{ route('jemaat.create') }}" class="flex items-center gap-4 p-4 bg-gradient-to-br from-indigo-50 to-indigo-50 hover:from-indigo-100 hover:to-indigo-100 rounded-2xl transition-all duration-200 group border border-indigo-200 hover:border-indigo-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-indigo-500 rounded-xl text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-slate-900">Tambah Jemaat Baru</p>
                        <p class="text-sm text-slate-600">Daftarkan anggota gereja baru ke sistem</p>
                    </div>
                    <i class="fas fa-arrow-right text-slate-300 group-hover:text-indigo-500 transition-colors"></i>
                </a>

                <a href="{{ route('cabang.create') }}" class="flex items-center gap-4 p-4 bg-gradient-to-br from-purple-50 to-purple-50 hover:from-purple-100 hover:to-purple-100 rounded-2xl transition-all duration-200 group border border-purple-200 hover:border-purple-300">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-500 rounded-xl text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-church"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-slate-900">Tambah Cabang Baru</p>
                        <p class="text-sm text-slate-600">Buat lokasi cabang gereja baru dalam sistem</p>
                    </div>
                    <i class="fas fa-arrow-right text-slate-300 group-hover:text-purple-500 transition-colors"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="text-center py-6">
        <p class="text-slate-500 text-sm">
            <span class="font-medium">Gereja Absensi</span> © 2026 — Sistem Manajemen Data Gereja
        </p>
    </div>
</div>
@endsection
