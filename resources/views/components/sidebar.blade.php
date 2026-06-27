<aside id="sidebar"
       class="fixed lg:translate-x-0 -translate-x-full inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 flex flex-col transition-all duration-300 ease-in-out overflow-hidden">

    <div class="h-16 flex items-center justify-between px-5 border-b border-gray-100 flex-shrink-0">
        <a href="{{ route('dashboard') ?? '/' }}" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center shadow-lg shadow-green-500/30 group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div class="sidebar-header-text">
                <h1 class="font-bold text-gray-800 text-base leading-tight">KasirPOS</h1>
                <p class="text-xs text-gray-500 leading-tight">Pak Mushab</p>
            </div>
        </a>

        <button onclick="toggleSidebar()" class="lg:hidden p-1.5 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3">

        <div class="menu-text px-3 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Utama</p>
        </div>

        <ul class="space-y-1">
            <li>
                <a href="{{ route('dashboard') ?? '#' }}"
                   data-tooltip="Dashboard"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kategori.index') ?? '#' }}"
                   data-tooltip="Kategori"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('kategori.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('kategori.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span class="menu-text">Kategori</span>
                    <span class="menu-badge ml-auto text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-semibold">{{ $total }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('produk.index') }}"
                   data-tooltip="Produk"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('produk.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('produk.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span class="menu-text">Produk</span>
                </a>
            </li>

            <li>
                <a href="#"
                   data-tooltip="Stok"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('stok.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('stok.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span class="menu-text">Stok</span>
                    <span class="menu-badge ml-auto text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full font-semibold">3</span>
                </a>
            </li>

            <li>
                <a href="#"
                   data-tooltip="Transaksi"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('transaksi.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('transaksi.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span class="menu-text">Transaksi</span>
                </a>
            </li>

            <li>
                <a href="#"
                   data-tooltip="Laporan"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('laporan.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('laporan.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="menu-text">Laporan</span>
                </a>
            </li>
        </ul>

        <div class="menu-text px-3 mt-6 mb-2">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Manajemen</p>
        </div>

        <ul class="space-y-1">
            <li>
                <a href="#"
                   data-tooltip="User"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('user.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('user.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="menu-text">User</span>
                </a>
            </li>

            <li>
                <a href="#"
                   data-tooltip="Role Permission"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('role.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('role.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="menu-text">Role Permission</span>
                </a>
            </li>

            <li>
                <a href="#"
                   data-tooltip="Pengaturan"
                   class="menu-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('pengaturan.*') ? 'active' : 'text-gray-600 hover:text-green-700' }}">
                    <svg class="menu-icon w-5 h-5 flex-shrink-0 {{ request()->routeIs('pengaturan.*') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="menu-text">Pengaturan</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="border-t border-gray-100 p-3 flex-shrink-0">
        <div class="hidden lg:block">
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold shadow-md">
                        PM
                    </div>
                    <div class="sidebar-footer-info min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">Pak Mushab</p>
                        <p class="text-xs text-gray-500 truncate">Super Admin</p>
                    </div>
                </div>
                <div class="sidebar-footer-info flex items-center gap-2 text-xs text-green-700">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span>Online - Shift Pagi</span>
                </div>
            </div>
        </div>
    </div>
</aside>
