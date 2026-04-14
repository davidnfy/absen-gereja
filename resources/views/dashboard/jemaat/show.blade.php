@extends('layouts.dashboard')

@section('title', 'Profil Jemaat')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Profil Jemaat</h1>
        <div class="space-x-2">
            <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('jemaat.index') }}" class="inline-block bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow p-8">
                <div class="space-y-6">
                    <div class="border-b pb-4">
                        <p class="text-gray-600 text-sm">NIK</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $jemaat->nik }}</p>
                    </div>

                    <div class="border-b pb-4">
                        <p class="text-gray-600 text-sm">Nama Lengkap</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $jemaat->nama_lengkap }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-b pb-4">
                        <div>
                            <p class="text-gray-600 text-sm">Tempat Lahir</p>
                            <p class="text-lg font-bold text-gray-800">{{ $jemaat->tempat_lahir }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Tanggal Lahir</p>
                            <p class="text-lg font-bold text-gray-800">{{ $jemaat->tanggal_lahir->format('d-m-Y') }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-b pb-4">
                        <div>
                            <p class="text-gray-600 text-sm">Jenis Kelamin</p>
                            <p class="text-lg font-bold text-gray-800">{{ $jemaat->jenis_kelamin }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Cabang</p>
                            <p class="text-lg font-bold text-gray-800">{{ $jemaat->cabang }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-gray-600 text-sm">Terdaftar Sejak</p>
                        <p class="text-lg font-bold text-gray-800">{{ $jemaat->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-lg shadow p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Info Lainnya</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-600 text-sm">Usia</p>
                        <p class="text-lg font-bold text-gray-800">
                            {{ $jemaat->tanggal_lahir->age }} tahun
                        </p>
                    </div>
                    <div>
                        <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-200">
                                <i class="fas fa-trash mr-2"></i> Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
