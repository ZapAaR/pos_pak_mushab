@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas toko hari ini')

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

        {{-- Card 1 --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#16A34A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-[#16A34A] bg-[#F0FDF4] px-2 py-1 rounded-full">+12%</span>
            </div>
            <h3 class="text-2xl font-bold text-[#14532D]">Rp 15.2jt</h3>
            <p class="text-sm text-[#4B5563] mt-1">Pendapatan Hari Ini</p>
        </div>

        {{-- Card 2 --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#16A34A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-[#16A34A] bg-[#F0FDF4] px-2 py-1 rounded-full">+8%</span>
            </div>
            <h3 class="text-2xl font-bold text-[#14532D]">248</h3>
            <p class="text-sm text-[#4B5563] mt-1">Transaksi Hari Ini</p>
        </div>

        {{-- Card 3 --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#16A34A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-red-500 bg-red-50 px-2 py-1 rounded-full">5 item</span>
            </div>
            <h3 class="text-2xl font-bold text-[#14532D]">1,247</h3>
            <p class="text-sm text-[#4B5563] mt-1">Total Produk</p>
        </div>

        {{-- Card 4 --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#16A34A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-[#16A34A] bg-[#F0FDF4] px-2 py-1 rounded-full">+3</span>
            </div>
            <h3 class="text-2xl font-bold text-[#14532D]">12</h3>
            <p class="text-sm text-[#4B5563] mt-1">User Aktif</p>
        </div>

    </div>

    {{-- Content Area --}}
    <div class="bg-white rounded-2xl p-6 border border-gray-200">
        <h2 class="text-lg font-bold text-[#14532D] mb-4">Aktivitas Terbaru</h2>
        <p class="text-sm text-[#4B5563]">Konten dashboard Anda di sini...</p>
    </div>

</div>
@endsection
