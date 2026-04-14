@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-black bg-opacity-20 backdrop-blur-sm rounded-full mb-3">
            <i class="fas fa-shield-alt text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-white mb-1">Reset Password</h1>
        <p class="text-white text-opacity-90 text-sm">Buat password baru yang aman</p>
    </div>

    <!-- Reset Password Card -->
    <div class="bg-white bg-opacity-95 backdrop-blur-lg rounded-2xl shadow-2xl p-6 border border-white border-opacity-20">
        <div class="text-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 mb-1">Password Baru</h2>
            <p class="text-gray-600 text-sm">Masukkan password baru untuk akun Anda</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span class="font-medium">Error:</span>
                </div>
                <ul class="mt-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukkan email Anda">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-lock mr-2 text-gray-500"></i>Password Baru
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Minimal 8 karakter">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-shield-alt mr-2 text-gray-500"></i>Konfirmasi Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Ulangi password baru">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-2.5 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                <i class="fas fa-save mr-2"></i>Reset Password
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 text-xs font-medium transition-colors duration-200">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
            </a>
        </div>
    </div>
</div>
@endsection
