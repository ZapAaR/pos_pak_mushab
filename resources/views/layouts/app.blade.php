<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - KasirPOS Pak Mushab</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #22C55E;
            --color-primary-dark: #16A34A;
            --color-primary-light: #86EFAC;
            --color-primary-bg: #F0FDF4;
            --color-primary-darker: #14532D;
            --color-gray: #4B5563;
        }

        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #86EFAC; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #22C55E; }

        .sidebar-collapsed { width: 5rem !important; }
        .sidebar-collapsed .menu-text,
        .sidebar-collapsed .menu-badge,
        .sidebar-collapsed .sidebar-header-text,
        .sidebar-collapsed .sidebar-footer-info { display: none; }
        .sidebar-collapsed .menu-icon { margin: 0 auto; }

        .main-content { transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1); }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.4s ease-out; }

        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        .animate-slide-in { animation: slideIn 0.3s ease-out; }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .dropdown-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .menu-item.active {
            background: linear-gradient(135deg, #22C55E 0%, #16A34A 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }
        .menu-item.active svg { color: white; }

        .menu-item:not(.active):hover {
            background-color: #F0FDF4;
            transform: translateX(4px);
        }

        .sidebar-overlay {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-collapsed .menu-item { position: relative; }
        .sidebar-collapsed .menu-item:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            margin-left: 0.75rem;
            padding: 0.375rem 0.75rem;
            background: #14532D;
            color: white;
            font-size: 0.75rem;
            border-radius: 0.375rem;
            white-space: nowrap;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">

    @auth
    <div class="flex h-screen overflow-hidden">

        <div id="sidebarOverlay"
             class="sidebar-overlay fixed inset-0 bg-black/50 z-40 lg:hidden"
             onclick="toggleSidebar()"></div>

        @include('components.sidebar')

        <div id="mainContent" class="main-content flex-1 flex flex-col min-h-screen lg:ml-72 overflow-hidden">

            @include('components.navbar')

            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">
                <div class="animate-fade-in max-w-7xl mx-auto">
                    @hasSection('breadcrumb')
                        <nav class="flex mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
                            @yield('breadcrumb')
                        </nav>
                    @endif

                    @hasSection('page-header')
                        <div class="mb-6">
                            @yield('page-header')
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3 animate-fade-in" id="flashSuccess">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-green-700 text-sm font-medium">{{ session('success') }}</span>
                            <button onclick="this.parentElement.remove()" class="ml-auto text-green-500 hover:text-green-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3 animate-fade-in">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-red-700 text-sm font-medium">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded-xl animate-fade-in">
                            <ul class="list-disc list-inside text-sm text-yellow-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>

            <footer class="border-t border-gray-200 bg-white px-6 py-4">
                <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} <span class="font-semibold text-green-600">KasirPOS Pak Mushab</span>. All rights reserved.</p>
                    <p>Version 1.0.0</p>
                </div>
            </footer>
        </div>
    </div>
    @else
        <script>window.location.href = "{{ route('login') }}";</script>
    @endauth

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');
            const isMobile = window.innerWidth < 1024;

            if (isMobile) {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('active');
            } else {
                sidebar.classList.toggle('sidebar-collapsed');
                if (sidebar.classList.contains('sidebar-collapsed')) {
                    mainContent.style.marginLeft = '5rem';
                    localStorage.setItem('sidebarCollapsed', 'true');
                } else {
                    mainContent.style.marginLeft = '18rem';
                    localStorage.setItem('sidebarCollapsed', 'false');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            if (isCollapsed && window.innerWidth >= 1024) {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.style.marginLeft = '5rem';
            }

            const flashSuccess = document.getElementById('flashSuccess');
            if (flashSuccess) {
                setTimeout(() => {
                    flashSuccess.style.opacity = '0';
                    flashSuccess.style.transform = 'translateY(-10px)';
                    setTimeout(() => flashSuccess.remove(), 300);
                }, 5000);
            }
        });

        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
            allDropdowns.forEach(d => {
                if (d.id !== id) d.classList.remove('active');
            });
            dropdown.classList.toggle('active');
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('[data-dropdown]')) {
                document.querySelectorAll('.dropdown-menu').forEach(d => d.classList.remove('active'));
            }
        });

        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');

            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('active');
                if (!sidebar.classList.contains('sidebar-collapsed')) {
                    mainContent.style.marginLeft = '18rem';
                }
            } else {
                mainContent.style.marginLeft = '0';
                sidebar.classList.add('-translate-x-full');
            }
        });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchInput = document.getElementById('globalSearch');
                if (searchInput) searchInput.focus();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
