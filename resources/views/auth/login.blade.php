@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md mx-auto">
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-black bg-opacity-20 backdrop-blur-sm rounded-full mb-3">
            <i class="fas fa-church text-black text-2xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-black mb-1">Gereja Absensi</h1>
        <p class="text-black text-opacity-90 text-sm">Sistem Manajemen Data Jemaat</p>
    </div>

    <div class="bg-white bg-opacity-95 backdrop-blur-lg rounded-2xl shadow-2xl p-6 border border-white border-opacity-20">
        <div class="text-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 mb-1">Selamat Datang</h2>
            <p class="text-gray-600 text-sm">Masuk ke akun Anda</p>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

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

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukkan email Anda">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-lock mr-2 text-gray-500"></i>Password
                </label>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukkan password Anda">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-800 text-xs font-medium">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-2.5 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
            </button>
        </form>

        <div class="mt-4 text-center text-gray-500 text-xs">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Daftar Sekarang</a>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #EDEBDE;
    }
</style>