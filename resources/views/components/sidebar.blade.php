<aside
    id="sidebar"
    class="sidebar-transition w-64 bg-white border-r border-gray-200 flex flex-col fixed lg:relative h-full z-40 -translate-x-full lg:translate-x-0"
    aria-label="Sidebar navigation"
>
    {{-- Logo --}}
    <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#22C55E] to-[#16A34A] flex items-center justify-center shadow-lg shadow-[#22C55E]/30">
                <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                    <path d="M7 8h10M7 12h10M7 16h6"/>
                </svg>
            </div>
            <div class="sidebar-text">
                <p class="font-bold text-[#14532D] text-lg leading-tight">KasirPOS</p>
                <p class="text-xs text-[#4B5563]">Pak Mushab</p>
            </div>
        </div>

        {{-- Collapse Button (Desktop Only) --}}
        <button
            id="collapseSidebar"
            class="hidden lg:flex w-8 h-8 items-center justify-center rounded-lg hover:bg-[#F0FDF4] text-[#4B5563] hover:text-[#16A34A] transition-colors"
            aria-label="Toggle sidebar"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 19l-7-7 7-7M18 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto py-4 px-3">
        <ul class="space-y-1">

            {{-- Dashboard --}}
            <li>
                <a
                    href="{{ route('dashboard') }}"
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('dashboard')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                    aria-current="{{ request()->routeIs('dashboard') ? 'page' : false }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            {{-- Kategori --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('kategori.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 7h16M4 12h16M4 17h10"/>
                    </svg>
                    <span class="sidebar-text">Kategori</span>
                </a>
            </li>

            {{-- Produk --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('produk.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span class="sidebar-text">Produk</span>
                </a>
            </li>

            {{-- Stok --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('stok.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                    </svg>
                    <span class="sidebar-text">Stok</span>
                </a>
            </li>

            {{-- Transaksi --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('transaksi.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <span class="sidebar-text">Transaksi</span>
                </a>
            </li>

            {{-- Laporan --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('laporan.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="sidebar-text">Laporan</span>
                </a>
            </li>

            {{-- Divider --}}
            <li class="pt-4 pb-2">
                <p class="sidebar-text px-3 text-xs font-semibold text-[#4B5563]/60 uppercase tracking-wider">
                    Manajemen
                </p>
            </li>

            {{-- User --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('user.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                    <span class="sidebar-text">User</span>
                </a>
            </li>

            {{-- Role Permission --}}
            <li>
                <a
                    href=""
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('role-permission.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span class="sidebar-text">Role & Permission</span>
                </a>
            </li>

            {{-- Pengaturan --}}
            <li>
                <a
                    href="{{ route('profile.edit') }}"
                    class="group flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                           {{ request()->routeIs('pengaturan.*')
                               ? 'bg-gradient-to-r from-[#22C55E] to-[#16A34A] text-white shadow-md shadow-[#22C55E]/30'
                               : 'text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A]' }}"
                >
                    <svg class="sidebar-icon w-5 h-5 mr-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    <span class="sidebar-text">Pengaturan</span>
                </a>
            </li>

        </ul>
    </nav>

    {{-- Footer --}}
    <div class="border-t border-gray-200 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#86EFAC] to-[#22C55E] flex items-center justify-center text-white font-bold text-sm">
                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="sidebar-text flex-1 min-w-0">
                <p class="text-sm font-semibold text-[#14532D] truncate">{{ Auth::user()->name ?? 'User' }}</p>
                <p class="text-xs text-[#4B5563] truncate">{{ Auth::user()->email ?? 'user@kasirpos.com' }}</p>
            </div>
        </div>
    </div>
</aside>
