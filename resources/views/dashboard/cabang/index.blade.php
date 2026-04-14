@extends('layouts.dashboard')

@section('title', 'Data Cabang')

@section('content')
<div class="space-y-5">
    <!-- Header -->
    <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-slate-200">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl">
                    <i class="fas fa-church text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Data Cabang Gereja</h1>
                    <p class="text-slate-600 text-sm mt-1">Kelola seluruh cabang gereja yang ada dalam sistem</p>
                </div>
            </div>
            <a href="{{ route('cabang.create') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white rounded-2xl transition-all duration-200 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <i class="fas fa-plus mr-2"></i>Tambah Cabang
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 bg-slate-50">
            <h3 class="text-base font-semibold text-slate-900">Daftar Cabang Gereja</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-church mr-2 text-slate-400"></i>Nama Cabang
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            <i class="fas fa-cogs mr-2 text-slate-400"></i>Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($cabangs as $cabang)
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-lg mr-3">
                                        <i class="fas fa-church text-emerald-600 text-sm"></i>
                                    </div>
                                    <span class="text-sm font-medium text-slate-900">{{ $cabang->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('cabang.edit', $cabang->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 hover:bg-emerald-100 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <form action="{{ route('cabang.destroy', $cabang->id) }}" method="POST" class="inline-block"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus cabang \"{{ $cabang->name }}\"?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-trash mr-1"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                        <i class="fas fa-church text-gray-400 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada cabang</h3>
                                    <p class="text-gray-600 mb-4">Mulai tambahkan cabang gereja pertama Anda</p>
                                    <a href="{{ route('cabang.create') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white rounded-lg transition-all duration-200 font-medium">
                                        <i class="fas fa-plus mr-2"></i>Tambah Cabang Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($cabangs->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                {{ $cabangs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
