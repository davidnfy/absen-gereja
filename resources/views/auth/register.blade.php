@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-black bg-opacity-20 backdrop-blur-sm rounded-full mb-3">
            <i class="fas fa-user-plus text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-white mb-1">Daftar Akun</h1>
    </div>

    <div class="bg-white bg-opacity-95 backdrop-blur-lg rounded-2xl shadow-2xl p-6 border border-white border-opacity-20">
        <div class="text-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 mb-1">Buat Akun Baru</h2>
            <p class="text-gray-600 text-sm">Isi data Anda untuk mendaftar</p>
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

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user mr-2 text-gray-500"></i>Username
                </label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukan Username">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukkan email Anda">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-lock mr-2 text-gray-500"></i>Password
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Buat password kuat">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-shield-alt mr-2 text-gray-500"></i>Konfirmasi Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Ulangi password Anda">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-2.5 rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
            </button>
        </form>

        <div class="mt-4 text-center">
            <div class="text-gray-500 text-xs">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800 font-medium transition-colors duration-200">Masuk Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection
