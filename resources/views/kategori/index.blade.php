@extends('layouts.app')

@section('title', 'Kategori')

@section('breadcrumb')
<ol class="inline-flex items-center gap-2">
    <li class="flex items-center gap-2">
        <a href="{{ route('dashboard') }}" class="hover:text-green-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        </a>
        <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
    </li>
    <li class="text-gray-700 font-medium">Kategori</li>
</ol>
@endsection

@section('page-header')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center shadow-md shadow-green-500/30">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            </span>
            Manajemen Kategori
        </h1>
        <p class="text-sm text-gray-500 mt-1">Kelola kategori produk KasirPOS Pak Mushab</p>
    </div>
    <button onclick="openModal('createModal')"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl shadow-md shadow-green-500/30 hover:shadow-lg hover:shadow-green-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Kategori
    </button>
</div>
@endsection

@push('styles')
<style>
    /* Modal animation */
    .modal-overlay {
        opacity: 0;
        visibility: hidden;
        transition: all 0.25s ease;
    }
    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    .modal-content {
        transform: scale(0.95) translateY(10px);
        opacity: 0;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .modal-overlay.active .modal-content {
        transform: scale(1) translateY(0);
        opacity: 1;
    }

    /* Toast animation */
    @keyframes toastSlideIn {
        from { transform: translateX(120%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes toastSlideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(120%); opacity: 0; }
    }
    .toast {
        animation: toastSlideIn 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .toast.hiding {
        animation: toastSlideOut 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    /* Loading spinner */
    .spinner {
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        width: 1rem;
        height: 1rem;
        animation: spin 0.6s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* Table row hover */
    .table-row-hover {
        transition: background-color 0.15s ease;
    }
    .table-row-hover:hover {
        background-color: #F0FDF4;
    }
</style>
@endpush

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Kategori</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $categories->count() }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Halaman Aktif</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $categories->currentPage() }} / {{ $categories->lastPage() ?: 1 }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Data per Halaman</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $categories->count() }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- Table Header --}}
        <div class="p-4 md:p-6 border-b border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-lg font-bold text-gray-800">Daftar Kategori</h2>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" clip-rule="evenodd"/></svg>
                        {{ $categories->count() }} data
                    </span>
                </div>

                {{-- Search --}}
                <form action="{{ route('kategori.index') }}" method="GET" class="w-full md:w-80">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari kategori..."
                               class="w-full pl-10 pr-20 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent focus:bg-white transition-all">
                        @if(request('search'))
                            <a href="{{ route('kategori.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </a>
                        @else
                            <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-green-600 hover:text-green-700 transition-colors">
                                <span class="text-xs font-semibold">Cari</span>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Kategori</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider hidden md:table-cell">Slug</th>
                        <th class="px-4 md:px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Dibuat</th>
                        <th class="px-4 md:px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($categories as $index => $category)
                        <tr class="table-row-hover">
                            <td class="px-4 md:px-6 py-4 text-sm text-gray-600 font-medium">
                                {{ $categories->firstItem() + $index }}
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center flex-shrink-0">
                                        <span class="text-sm font-bold text-green-700">{{ strtoupper(substr($category->nama_kategori, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">{{ $category->nama_kategori }}</p>
                                        <p class="text-xs text-gray-500 md:hidden">{{ $category->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4 hidden md:table-cell">
                                <code class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-md font-mono">{{ $category->slug }}</code>
                            </td>
                            <td class="px-4 md:px-6 py-4 text-sm text-gray-600 hidden lg:table-cell">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $category->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick='openEditModal(@json($category))'
                                            class="p-2 rounded-lg text-blue-600 hover:bg-blue-50 transition-colors"
                                            title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button onclick="openDeleteModal('{{ $category->id }}', '{{ $category->nama_kategori }}')"
                                            class="p-2 rounded-lg text-red-600 hover:bg-red-50 transition-colors"
                                            title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-base font-semibold text-gray-700">Belum ada kategori</p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            @if(request('search'))
                                                Tidak ditemukan hasil untuk "<strong>{{ request('search') }}</strong>"
                                            @else
                                                Mulai tambahkan kategori pertama Anda
                                            @endif
                                        </p>
                                    </div>
                                    @if(!request('search'))
                                        <button onclick="openModal('createModal')"
                                                class="mt-2 inline-flex items-center gap-2 px-4 py-2 bg-green-500 text-white text-sm font-semibold rounded-lg hover:bg-green-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                            Tambah Kategori
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
            <div class="px-4 md:px-6 py-4 border-t border-gray-100">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                    <p class="text-sm text-gray-500">
                        Menampilkan <span class="font-semibold text-gray-700">{{ $categories->firstItem() }}</span>
                        sampai <span class="font-semibold text-gray-700">{{ $categories->lastItem() }}</span>
                        dari <span class="font-semibold text-gray-700">{{ $categories->count() }}</span> data
                    </p>
                    <div class="flex items-center gap-1">
                        {{-- Previous --}}
                        @if($categories->onFirstPage())
                            <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </span>
                        @else
                            <a href="{{ $categories->previousPageUrl() }}" class="px-3 py-1.5 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-300 hover:text-green-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </a>
                        @endif

                        {{-- Pagination Numbers --}}
                        @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if($page == $categories->currentPage())
                                <span class="px-3.5 py-1.5 text-sm font-semibold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3.5 py-1.5 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-300 hover:text-green-600 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}" class="px-3 py-1.5 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-300 hover:text-green-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        @else
                            <span class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

{{-- ============================================ --}}
{{-- MODAL: TAMBAH KATEGORI --}}
{{-- ============================================ --}}
<div id="createModal" class="modal-overlay fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <form id="createForm" action="{{ route('kategori.store') }}" method="POST" novalidate>
            @csrf

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-green-500 to-green-600">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Tambah Kategori</h3>
                        <p class="text-xs text-green-100">Isi form di bawah dengan benar</p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('createModal')" class="p-1.5 rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="p-6 space-y-4">
                {{-- Nama Kategori --}}
                <div>
                    <label for="create_name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        </div>
                        <input type="text"
                               id="create_name"
                               name="nama_kategori"
                               value="{{ old('nama_kategori') }}"
                               placeholder="Contoh: Minuman Panas"
                               class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent focus:bg-white transition-all @error('nama_kategori') border-red-400 focus:ring-red-500 @enderror">
                    </div>
                    @error('nama_kategori')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div>
                    <label for="create_slug" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Slug <span class="text-gray-400 font-normal text-xs">(otomatis)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        </div>
                        <input type="text"
                               id="create_slug"
                               name="slug"
                               value="{{ old('slug') }}"
                               placeholder="minuman-panas"
                               class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent focus:bg-white transition-all font-mono @error('slug') border-red-400 focus:ring-red-500 @enderror">
                    </div>
                    @error('slug')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-2 px-6 py-4 bg-gray-50 border-t border-gray-100">
                <button type="button" onclick="closeModal('createModal')"
                        class="px-4 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-100 transition-colors">
                    Batal
                </button>
                <button type="submit" id="createSubmitBtn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-md shadow-green-500/30 hover:shadow-lg hover:shadow-green-500/40 transition-all disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="spinner hidden"></span>
                    <span class="btn-text">Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ============================================ --}}
{{-- MODAL: EDIT KATEGORI --}}
{{-- ============================================ --}}
<div id="editModal" class="modal-overlay fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <form id="editForm" action="" method="POST" novalidate>
            @csrf
            @method('PUT')

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Edit Kategori</h3>
                        <p class="text-xs text-blue-100">Perbarui informasi kategori</p>
                    </div>
                </div>
                <button type="button" onclick="closeModal('editModal')" class="p-1.5 rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="p-6 space-y-4">
                {{-- Nama Kategori --}}
                <div>
                    <label for="edit_name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        </div>
                        <input type="text"
                               id="edit_name"
                               name="nama_kategori"
                               placeholder="Nama kategori"
                               class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all @error('nama_kategori') border-red-400 focus:ring-red-500 @enderror">
                    </div>
                    @error('nama_kategori')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div>
                    <label for="edit_slug" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Slug <span class="text-gray-400 font-normal text-xs">(otomatis)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        </div>
                        <input type="text"
                               id="edit_slug"
                               name="slug"
                               placeholder="slug-kategori"
                               class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all font-mono @error('slug') border-red-400 focus:ring-red-500 @enderror">
                    </div>
                    @error('slug')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-2 px-6 py-4 bg-gray-50 border-t border-gray-100">
                <button type="button" onclick="closeModal('editModal')"
                        class="px-4 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-100 transition-colors">
                    Batal
                </button>
                <button type="submit" id="editSubmitBtn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-md shadow-blue-500/30 hover:shadow-lg hover:shadow-blue-500/40 transition-all disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span class="spinner hidden"></span>
                    <span class="btn-text">Update</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ============================================ --}}
{{-- MODAL: HAPUS KATEGORI --}}
{{-- ============================================ --}}
<div id="deleteModal" class="modal-overlay fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <form id="deleteForm" action="" method="POST">
            @csrf
            @method('DELETE')

            {{-- Body --}}
            <div class="p-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800">Hapus Kategori?</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            Anda akan menghapus kategori <strong id="deleteCategoryName" class="text-gray-800"></strong>. Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-2 px-6 py-4 bg-gray-50 border-t border-gray-100">
                <button type="button" onclick="closeModal('deleteModal')"
                        class="px-4 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-100 transition-colors">
                    Batal
                </button>
                <button type="submit" id="deleteSubmitBtn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-md shadow-red-500/30 hover:shadow-lg hover:shadow-red-500/40 transition-all disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span class="spinner hidden"></span>
                    <span class="btn-text">Ya, Hapus</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Toast Container --}}
<div id="toastContainer" class="fixed top-4 right-4 z-[100] flex flex-col gap-2 pointer-events-none"></div>

@endsection

@push('scripts')
<script>
    // ============================================
    // MODAL MANAGEMENT
    // ============================================
    let activeModal = null;

    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        activeModal = modalId;

        // Focus first input
        setTimeout(() => {
            const firstInput = modal.querySelector('input:not([type="hidden"])');
            if (firstInput) firstInput.focus();
        }, 200);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        modal.classList.remove('active');
        document.body.style.overflow = '';
        activeModal = null;

        // Reset form & errors
        const form = modal.querySelector('form');
        if (form && modalId !== 'deleteModal') {
            form.reset();
            form.querySelectorAll('.text-red-600').forEach(el => {
                if (el.tagName === 'P') el.remove();
            });
        }
    }

    function openEditModal(category) {
        const form = document.getElementById('editForm');
        form.action = `/kategori/${category.id}`;
        document.getElementById('edit_name').value = category.nama_kategori || '';
        document.getElementById('edit_slug').value = category.slug || '';
        openModal('editModal');
    }

    function openDeleteModal(id, nama_kategori) {
        const form = document.getElementById('deleteForm');
        form.action = `/kategori/${id}`;
        document.getElementById('deleteCategoryName').textContent = nama_kategori;
        openModal('deleteModal');
    }

    // Close on overlay click
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this.id);
            }
        });
    });

    // Close on ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && activeModal) {
            closeModal(activeModal);
        }
    });

    // ============================================
    // AUTO GENERATE SLUG
    // ============================================
    function generateSlug(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    // Create Modal
    const createName = document.getElementById('create_name');
    const createSlug = document.getElementById('create_slug');
    let createSlugManual = false;

    if (createName && createSlug) {
        createName.addEventListener('input', function() {
            if (!createSlugManual) {
                createSlug.value = generateSlug(this.value);
            }
        });
        createSlug.addEventListener('input', function() {
            createSlugManual = this.value !== generateSlug(createName.value);
        });
    }

    // Edit Modal
    const editName = document.getElementById('edit_name');
    const editSlug = document.getElementById('edit_slug');
    let editSlugManual = false;

    if (editName && editSlug) {
        editName.addEventListener('input', function() {
            if (!editSlugManual) {
                editSlug.value = generateSlug(this.value);
            }
        });
        editSlug.addEventListener('input', function() {
            editSlugManual = this.value !== generateSlug(editName.value);
        });
        // Reset manual flag when modal opens
        document.getElementById('editModal').addEventListener('click', function() {
            editSlugManual = false;
        });
    }

    // ============================================
    // LOADING BUTTON ON SUBMIT
    // ============================================
    function setupFormLoading(formId, btnId) {
        const form = document.getElementById(formId);
        const btn = document.getElementById(btnId);
        if (!form || !btn) return;

        form.addEventListener('submit', function() {
            const icon = btn.querySelector('.btn-icon');
            const spinner = btn.querySelector('.spinner');
            const text = btn.querySelector('.btn-text');

            if (icon) icon.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');
            if (text) text.textContent = 'Memproses...';
            btn.disabled = true;
        });
    }

    setupFormLoading('createForm', 'createSubmitBtn');
    setupFormLoading('editForm', 'editSubmitBtn');
    setupFormLoading('deleteForm', 'deleteSubmitBtn');

    // ============================================
    // TOAST NOTIFICATION
    // ============================================
    function showToast(message, type = 'success') {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');

        const colors = {
            success: {
                bg: 'bg-white',
                border: 'border-green-500',
                icon: 'text-green-500',
                iconSvg: '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
            },
            error: {
                bg: 'bg-white',
                border: 'border-red-500',
                icon: 'text-red-500',
                iconSvg: '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>'
            },
            warning: {
                bg: 'bg-white',
                border: 'border-yellow-500',
                icon: 'text-yellow-500',
                iconSvg: '<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>'
            }
        };

        const config = colors[type] || colors.success;

        toast.className = `toast pointer-events-auto flex items-center gap-3 min-w-[280px] max-w-sm ${config.bg} border-l-4 ${config.border} rounded-lg shadow-2xl p-4`;
        toast.innerHTML = `
            <svg class="w-5 h-5 ${config.icon} flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">${config.iconSvg}</svg>
            <p class="flex-1 text-sm font-medium text-gray-800">${message}</p>
            <button onclick="this.parentElement.classList.add('hiding'); setTimeout(() => this.parentElement.remove(), 300)" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </button>
        `;

        container.appendChild(toast);

        // Auto remove after 4s
        setTimeout(() => {
            if (toast.parentElement) {
                toast.classList.add('hiding');
                setTimeout(() => toast.remove(), 300);
            }
        }, 4000);
    }

    // ============================================
    // AUTO SHOW MODAL ON VALIDATION ERROR
    // ============================================
    @if($errors->any() && session('_old_input'))
        // Jika ada error dan old input tersimpan, buka modal yang sesuai
        document.addEventListener('DOMContentLoaded', function() {
            openModal('{{ session('_modal_type', 'createModal') }}');
        });
    @endif

    // ============================================
    // FLASH MESSAGE TOAST
    // ============================================
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast(@json(session('success')), 'success');
        });
    @endif

    @if(session('error'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast(@json(session('error')), 'error');
        });
    @endif

    @if(session('warning'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast(@json(session('warning')), 'warning');
        });
    @endif

    // ============================================
    // AUTO OPEN MODAL IF VALIDATION ERROR EXIST
    // ============================================
    @if($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah error berasal dari form create atau edit
            @if($errors->has('nama_kategori') || $errors->has('slug'))
                // Jika ada old('_method') = PUT, buka edit modal
                @if(old('_method') === 'PUT')
                    openModal('editModal');
                @else
                    openModal('createModal');
                @endif
            @endif
        });
    @endif
</script>
@endpush
