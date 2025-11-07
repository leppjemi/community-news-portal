<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Community News Portal</title>
    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-base-200">
    <div class="drawer lg:drawer-open">
        <input id="admin-drawer" type="checkbox" class="drawer-toggle" />
        
        <!-- Page Content -->
        <div class="drawer-content flex flex-col">
            <!-- Top Navbar -->
            <div class="navbar bg-base-100 shadow-lg border-b border-base-300 sticky top-0 z-40">
                <div class="flex-none lg:hidden">
                    <label for="admin-drawer" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                </div>
                
                <div class="flex-1">
                    <div class="breadcrumbs text-sm">
                        <ul>
                            <li><a href="{{ route('home') }}" class="link link-hover">Home</a></li>
                            <li><a href="{{ route('dashboard') }}" class="link link-hover">Dashboard</a></li>
                            @yield('breadcrumbs')
                        </ul>
                    </div>
                </div>
                
                <div class="flex-none gap-2">
                    <x-navbar.theme-toggle />
                    <x-navbar.user-dropdown />
                </div>
            </div>
            
            <!-- Main Content Area -->
            <main class="flex-1 p-4 lg:p-6 xl:p-8">
                <!-- Flash Messages -->
                @if(session('message'))
                    <div class="alert alert-success mb-6 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('message') }}</span>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mb-6 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error mb-6 shadow-lg">
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
        </div>
        
        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="admin-drawer" class="drawer-overlay"></label>
            <aside class="w-64 min-h-full bg-base-100 border-r border-base-300">
                <!-- Sidebar Header -->
                <div class="p-4 border-b border-base-300">
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div class="bg-error text-error-content rounded-lg w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Admin Panel</h2>
                            <p class="text-xs text-base-content/70">Control Center</p>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="menu p-4 gap-1 pb-24">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 {{ (request()->route()->getName() ?? '') === 'dashboard' ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="menu-title mt-4">
                        <span>Management</span>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 {{ str_starts_with(request()->route()->getName() ?? '', 'admin.categories') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                            <span>Categories</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 {{ str_starts_with(request()->route()->getName() ?? '', 'admin.users') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span>Users</span>
                        </a>
                    </li>
                    
                    <li class="menu-title mt-4">
                        <span>Analytics</span>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center gap-3 {{ (request()->route()->getName() ?? '') === 'admin.analytics' ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                            <span>Social Share Analytics</span>
                        </a>
                    </li>
                </ul>
                
                <!-- Sidebar Footer -->
                <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-base-300 bg-base-100">
                    <div class="flex flex-col min-w-0">
                        <p class="text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-base-content/70 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
    
    <script>
        // Theme switcher
        const themeController = document.querySelector('.theme-controller');
        const html = document.documentElement;
        
        // Check for saved theme preference or default to light
        const currentTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-theme', currentTheme);
        if (themeController) {
            themeController.checked = currentTheme === 'dark';
            
            themeController.addEventListener('change', (e) => {
                const theme = e.target.checked ? 'dark' : 'light';
                html.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
            });
        }
    </script>
</body>
</html>

