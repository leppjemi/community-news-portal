<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Community News Portal')</title>
    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-base-100 flex flex-col">
    <!-- Navigation -->
    <div class="navbar bg-base-100/95 backdrop-blur-md shadow-lg border-b border-base-300 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex items-center">
            @php
                $currentRoute = request()->route()?->getName() ?? '';
                $isPublic = in_array($currentRoute, ['home', 'news.show']);
                $isDashboard = $currentRoute === 'dashboard';
                $isUserModule = in_array($currentRoute, ['my-submissions', 'submit-news', 'edit-news']);
                $isEditorModule = $currentRoute && str_starts_with($currentRoute, 'editor.');
                $isAdminModule = $currentRoute && str_starts_with($currentRoute, 'admin.');
            @endphp

            <!-- Left: Theme Switcher & Logo -->
            <div class="flex-none flex items-center gap-2">
                <x-navbar.theme-toggle />
                <x-navbar.logo />
            </div>

            <!-- Center: Module-specific Menu (Desktop) -->
            <div class="flex-1 hidden lg:flex justify-center">
                <div class="flex items-center gap-2">
                    @if($isPublic)
                        <x-navbar.guest-menu :currentRoute="$currentRoute" />
                    @elseif($isDashboard)
                        <x-navbar.dashboard-menu :currentRoute="$currentRoute" />
                    @elseif($isUserModule)
                        <x-navbar.user-menu :currentRoute="$currentRoute" />
                    @elseif($isEditorModule)
                        <x-navbar.editor-menu :currentRoute="$currentRoute" />
                    @elseif($isAdminModule)
                        <x-navbar.admin-menu :currentRoute="$currentRoute" />
                    @endif
                </div>
            </div>

            <!-- Right: User/Login Menu (Desktop) -->
            <div class="flex-none hidden lg:flex items-center gap-2 ml-auto">
                <x-navbar.user-dropdown />
            </div>

            <!-- Mobile Menu -->
            <x-navbar.mobile-menu />
        </div>
    </div>

    <main class="flex-1 container mx-auto px-4 py-6 lg:py-8">
        @if(session('message'))
            <div class="alert alert-success mb-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error mb-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="font-bold">Please fix the following errors:</h3>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer footer-center p-10 bg-base-200 text-base-content border-t border-base-300">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <p class="font-bold text-lg">Community News Portal</p>
            <p class="text-sm opacity-70">Copyright © {{ date('Y') }} - All rights reserved</p>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
    
    <script>
        // Theme switcher
        const themeController = document.querySelector('.theme-controller');
        const html = document.documentElement;
        
        // Check for saved theme preference or default to light
        const currentTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-theme', currentTheme);
        themeController.checked = currentTheme === 'dark';
        
        themeController.addEventListener('change', (e) => {
            const theme = e.target.checked ? 'dark' : 'light';
            html.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        });
    </script>
</body>
</html>

