@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="w-full max-w-md mx-auto">
    <!-- Logo/Brand Section -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-black bg-opacity-20 backdrop-blur-sm rounded-full mb-3">
            <i class="fas fa-key text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-white mb-1">Lupa Password</h1>
        <p class="text-white text-opacity-90 text-sm">Kami akan membantu Anda mengatur ulang password</p>
    </div>

    <!-- Forgot Password Card -->
    <div class="bg-white bg-opacity-95 backdrop-blur-lg rounded-2xl shadow-2xl p-6 border border-white border-opacity-20">
        <div class="text-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 mb-1">Reset Password</h2>
            <p class="text-gray-600 text-sm">Masukkan email Anda untuk menerima link reset</p>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="font-medium">Berhasil!</span>
                </div>
                <p class="mt-1">{{ session('status') }}</p>
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

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white text-sm"
                    placeholder="Masukkan email terdaftar">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-gray-600 to-gray-700 text-white py-2.5 rounded-lg hover:from-gray-700 hover:to-gray-800 transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                <i class="fas fa-paper-plane mr-2"></i>Kirim Link Reset
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 text-xs font-medium transition-colors duration-200">
                <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
            </a>
        </div>
    </div>
</div>
@endsection
