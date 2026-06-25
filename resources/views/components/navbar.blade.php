<header class="h-16 bg-white border-b border-gray-200 sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6">

    {{-- Left: Mobile Toggle + Breadcrumb --}}
    <div class="flex items-center gap-4">

        {{-- Mobile Hamburger --}}
        <button
            id="mobileSidebarToggle"
            class="lg:hidden w-10 h-10 flex items-center justify-center rounded-lg hover:bg-[#F0FDF4] text-[#4B5563] hover:text-[#16A34A] transition-colors"
            aria-label="Open sidebar"
        >
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Page Title --}}
        <div>
            <h1 class="text-lg font-bold text-[#14532D]">@yield('page-title', 'Dashboard')</h1>
            <p class="text-xs text-[#4B5563] hidden sm:block">@yield('page-subtitle', 'Selamat datang kembali')</p>
        </div>
    </div>

    {{-- Right: Actions --}}
    <div class="flex items-center gap-2 sm:gap-3">

        {{-- Search (Desktop) --}}
        <div class="hidden md:flex items-center">
            <div class="relative">
                <input
                    type="search"
                    placeholder="Cari..."
                    class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-200 bg-[#F0FDF4] text-sm text-[#14532D] placeholder:text-[#4B5563]/60 focus:outline-none focus:ring-2 focus:ring-[#22C55E]/40 focus:border-[#22C55E] transition-all"
                />
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#4B5563]/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="M21 21l-4.35-4.35"/>
                </svg>
            </div>
        </div>

        {{-- Notification --}}
        <button
            class="relative w-10 h-10 flex items-center justify-center rounded-lg hover:bg-[#F0FDF4] text-[#4B5563] hover:text-[#16A34A] transition-colors"
            aria-label="Notifications"
        >
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/>
            </svg>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        {{-- Profile Dropdown --}}
        <div class="relative">
            <button
                id="profileDropdownBtn"
                class="flex items-center gap-2 sm:gap-3 pl-2 pr-3 py-1.5 rounded-lg hover:bg-[#F0FDF4] transition-colors"
                aria-expanded="false"
                aria-haspopup="true"
            >
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#86EFAC] to-[#22C55E] flex items-center justify-center text-white font-bold text-sm">
                    {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="hidden sm:block text-left">
                    <p class="text-sm font-semibold text-[#14532D] leading-tight">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-[#4B5563]">{{ Auth::user()->role ?? 'Admin' }}</p>
                </div>
                <svg class="w-4 h-4 text-[#4B5563]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </button>

            {{-- Dropdown Menu --}}
            <div
                id="profileDropdownMenu"
                class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-200 py-2 animate-fade-in"
                role="menu"
            >
                {{-- User Info --}}
                <div class="px-4 py-3 border-b border-gray-200">
                    <p class="text-sm font-semibold text-[#14532D]">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-[#4B5563] truncate">{{ Auth::user()->email ?? 'user@kasirpos.com' }}</p>
                </div>

                {{-- Menu Items --}}
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A] transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Profil Saya
                </a>

                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-[#4B5563] hover:bg-[#F0FDF4] hover:text-[#16A34A] transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/>
                    </svg>
                    Pengaturan
                </a>

                <div class="border-t border-gray-200 my-2"></div>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>

    </div>
</header>
