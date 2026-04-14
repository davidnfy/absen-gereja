@extends('layouts.dashboard')

@section('title', 'Data Jemaat')

@section('content')
<div class="space-y-4 sm:space-y-5">
    <div class="bg-white rounded-2xl p-4 sm:p-6 lg:p-8 shadow-sm border border-slate-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl">
                    <i class="fas fa-users text-white text-base sm:text-lg"></i>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Data Jemaat</h1>
                    <p class="text-slate-600 text-xs sm:text-sm mt-1">Kelola dan pantau data anggota gereja secara cepat.</p>
                </div>
            </div>
            <a href="{{ route('jemaat.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-2xl transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>Tambah Jemaat
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-xs font-medium mb-1 sm:mb-2">Total Jemaat</p>
                    <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $jemaat->total() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-base sm:text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-xs font-medium mb-1 sm:mb-2">Laki-laki</p>
                    <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ \App\Models\Jemaat::where('jenis_kelamin', 'Laki-laki')->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-mars text-cyan-600 text-base sm:text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-xs font-medium mb-1 sm:mb-2">Perempuan</p>
                    <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ \App\Models\Jemaat::where('jenis_kelamin', 'Perempuan')->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-venus text-pink-600 text-base sm:text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-xs font-medium mb-1 sm:mb-2">Cabang</p>
                    <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ \App\Models\Cabang::count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-church text-purple-600 text-base sm:text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-slate-200 bg-slate-50">
            <h3 class="text-sm sm:text-base font-semibold text-slate-900">Daftar Jemaat Terdaftar</h3>
        </div>

        <div class="block md:hidden space-y-3 p-4">
            @forelse ($jemaat as $j)
                <div class="border border-slate-200 rounded-xl p-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">NIK</span>
                        <span class="text-sm font-medium text-slate-900">{{ $j->nik }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Nama</span>
                        <span class="text-sm text-slate-900">{{ $j->nama_lengkap }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-slate-500">Gender</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                            {{ $j->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                            <i class="fas {{ $j->jenis_kelamin == 'Laki-laki' ? 'fa-mars' : 'fa-venus' }} mr-1"></i>
                            {{ $j->jenis_kelamin }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs text-slate-500">Cabang</span>
                        <span class="text-sm text-slate-900">{{ $j->cabang }}</span>
                    </div>
                    <div class="flex gap-2 pt-2">
                        <a href="{{ route('jemaat.edit', $j->id) }}" class="flex-1 text-center px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 rounded-lg">
                            Edit
                        </a>
                        <form action="{{ route('jemaat.destroy', $j->id) }}" method="POST" class="flex-1"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data jemaat ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-3 py-2 text-xs font-medium text-red-700 bg-red-50 rounded-lg">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-slate-600 text-sm mb-4">Belum ada data jemaat</p>
                    <a href="{{ route('jemaat.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
                        Tambah Jemaat
                    </a>
                </div>
            @endforelse
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase">NIK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase">Nama Lengkap</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase">Jenis Kelamin</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase">Cabang</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($jemaat as $j)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $j->nik }}</td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $j->nama_lengkap }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $j->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                    {{ $j->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $j->cabang }}</td>
                            <td class="px-6 py-4 text-sm space-x-1">
                                <a href="{{ route('jemaat.edit', $j->id) }}" class="px-3 py-1 text-xs text-blue-700 bg-blue-50 rounded-lg">
                                    Edit
                                </a>
                                <form action="{{ route('jemaat.destroy', $j->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data jemaat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-xs text-red-700 bg-red-50 rounded-lg">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-slate-600 text-sm">Belum ada data jemaat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($jemaat->hasPages())
            <div class="px-4 sm:px-6 py-4 border-t border-slate-200 bg-slate-50">
                {{ $jemaat->links() }}
            </div>
        @endif
    </div>
</div>
@endsection