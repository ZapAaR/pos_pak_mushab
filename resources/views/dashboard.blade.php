@extends('layouts.app')
@section('title', 'Dashboard')

@section('page-header')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-sm text-gray-500 mt-1">Selamat datang kembali, {{ Auth::user()->name }} 👋</p>
    </div>
    <button class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-md hover:shadow-lg transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Transaksi Baru
    </button>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([
        ['Penjualan Hari Ini', 'Rp 2.450.000', '+12.5%', 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5'],
        ['Total Transaksi', '148', '+8.2%', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['Produk Terjual', '324', '+5.1%', 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4'],
        ['Stok Menipis', '3', 'Perlu restok', 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
    ] as $i => $card)
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card[3] }}"/></svg>
            </div>
            <span class="text-xs font-semibold {{ str_contains($card[2], '+') ? 'text-green-600' : 'text-yellow-600' }}">{{ $card[2] }}</span>
        </div>
        <p class="text-sm text-gray-500">{{ $card[0] }}</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $card[1] }}</p>
    </div>
    @endforeach
</div>
@endsection
