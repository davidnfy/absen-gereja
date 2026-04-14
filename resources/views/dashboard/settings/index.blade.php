@extends('layouts.dashboard')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
        <div class="flex items-center mb-4">
            <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl mr-4">
                <i class="fas fa-user-cog text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Akun</h1>
                <p class="text-gray-600">Kelola informasi akun Anda</p>
            </div>
        </div>
    </div>

    <!-- Profile Info Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-id-card text-blue-600 mr-2"></i>
            Informasi Profil
        </h3>
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Username</p>
                    <p class="font-semibold text-gray-800">{{ $user->username }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Email</p>
                    <p class="font-semibold text-gray-800">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Role</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                        <i class="fas fa-crown mr-1"></i>{{ ucfirst($user->role) }}
                    </span>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Bergabung Sejak</p>
                    <p class="font-semibold text-gray-800">{{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-edit text-green-600 mr-2"></i>
            Edit Informasi Akun
        </h3>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span class="font-medium">Error:</span>
                </div>
                <ul class="mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-gray-500"></i>Username
                    </label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <div class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Pastikan informasi yang Anda masukkan sudah benar
                </div>
                <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Security Notice -->
    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-200">
        <div class="flex items-start">
            <div class="flex items-center justify-center w-10 h-10 bg-yellow-100 rounded-lg mr-4">
                <i class="fas fa-shield-alt text-yellow-600"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 mb-2">Keamanan Akun</h4>
                <p class="text-sm text-gray-600 mb-3">
                    Untuk mengubah password, silakan hubungi administrator sistem.
                    Pastikan email Anda selalu aktif untuk menerima notifikasi penting.
                </p>
                <div class="flex items-center text-sm text-gray-500">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    Akun Anda terlindungi dengan sistem keamanan terkini
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
