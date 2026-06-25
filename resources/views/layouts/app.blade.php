<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — KasirPOS Pak Mushab</title>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Smooth transitions */
        .sidebar-transition {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                        transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Overlay animation */
        .overlay-transition {
            transition: opacity 0.3s ease;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F0FDF4; }
        ::-webkit-scrollbar-thumb { background: #86EFAC; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #22C55E; }

        /* Fade in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
    </style>
</head>

<body class="h-full bg-[#F0FDF4] text-[#4B5563] antialiased">

    @auth
    <div class="flex h-full overflow-hidden">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto bg-[#F0FDF4] p-4 sm:p-6 lg:p-8">

                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-lg bg-[#F0FDF4] border border-[#86EFAC] text-[#14532D] px-4 py-3 text-sm animate-fade-in">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-[#16A34A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12l5 5L20 7"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 flex items-start gap-3 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3 text-sm animate-fade-in">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v4M12 16h.01"/>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Yield Content --}}
                @yield('content')

            </main>
        </div>
    </div>

    {{-- Mobile Overlay --}}
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden overlay-transition"></div>

    @else
        {{-- Guest Layout --}}
        <main class="min-h-screen flex items-center justify-center p-4">
            @yield('content')
        </main>
    @endauth

    {{-- Global Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* ===== Sidebar State Management ===== */
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggleBtn = document.getElementById('sidebarToggle');
            const mobileToggleBtn = document.getElementById('mobileSidebarToggle');
            const collapseBtn = document.getElementById('collapseSidebar');

            // Load saved state
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed && sidebar) {
                sidebar.classList.add('w-20');
                sidebar.classList.remove('w-64');
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('.sidebar-icon').forEach(el => {
                    el.classList.remove('mr-3');
                });
            }

            // Desktop toggle
            if (collapseBtn && sidebar) {
                collapseBtn.addEventListener('click', () => {
                    const collapsed = sidebar.classList.contains('w-20');

                    if (collapsed) {
                        sidebar.classList.remove('w-20');
                        sidebar.classList.add('w-64');
                        document.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('hidden'));
                        document.querySelectorAll('.sidebar-icon').forEach(el => el.classList.add('mr-3'));
                    } else {
                        sidebar.classList.remove('w-64');
                        sidebar.classList.add('w-20');
                        document.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('hidden'));
                        document.querySelectorAll('.sidebar-icon').forEach(el => el.classList.remove('mr-3'));
                    }

                    localStorage.setItem('sidebarCollapsed', !collapsed);
                });
            }

            // Mobile toggle
            if (mobileToggleBtn && sidebar && overlay) {
                mobileToggleBtn.addEventListener('click', () => {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                });

                overlay.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                });
            }

            /* ===== Dropdown Profile ===== */
            const profileBtn = document.getElementById('profileDropdownBtn');
            const profileMenu = document.getElementById('profileDropdownMenu');

            if (profileBtn && profileMenu) {
                profileBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    profileMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
                        profileMenu.classList.add('hidden');
                    }
                });
            }

            /* ===== Auto-hide flash messages ===== */
        //     document.querySelectorAll('[class*="bg-"][class*="border"]').forEach(el => {
        //         if (el.closest('form')) return;
        //         setTimeout(() => {
        //             el.style.transition = 'opacity .4s ease, transform .4s ease';
        //             el.style.opacity = '0';
        //             el.style.transform = 'translateY(-8px)';
        //             setTimeout(() => el.remove(), 400);
        //         }, 5000);
        //     });
        });
    </script>

    @stack('scripts')
</body>
</html>
