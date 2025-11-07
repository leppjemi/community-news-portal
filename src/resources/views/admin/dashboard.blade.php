@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('breadcrumbs')
    <li class="text-base-content/70">Dashboard</li>
@endsection

@section('content')
<div>
    <!-- Welcome Header -->
    <div class="mb-6">
        <h1 class="text-3xl lg:text-4xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
        <p class="text-base-content/70">Here's an overview of your platform</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Users -->
        <div class="card bg-gradient-to-br from-primary to-primary-focus text-primary-content shadow-lg hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure opacity-20 absolute right-4 top-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="stat-title text-primary-content/80 text-xs font-medium uppercase tracking-wide">Total Users</div>
                    <div class="stat-value text-4xl font-bold">{{ number_format($stats['totalUsers']) }}</div>
                    <div class="stat-desc text-primary-content/70 mt-1 text-xs">Registered users</div>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-accent">
                        <div class="p-3 rounded-lg bg-accent/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Categories</div>
                    <div class="stat-value text-3xl font-bold">{{ number_format($stats['totalCategories']) }}</div>
                    <div class="stat-desc text-xs">Active categories</div>
                </div>
            </div>
        </div>

        <!-- Total News Posts -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-info">
                        <div class="p-3 rounded-lg bg-info/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">News Posts</div>
                    <div class="stat-value text-3xl font-bold">{{ number_format($stats['totalPosts']) }}</div>
                    <div class="stat-desc text-xs">All articles</div>
                </div>
            </div>
        </div>

        <!-- Published Posts -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-success">
                        <div class="p-3 rounded-lg bg-success/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Published</div>
                    <div class="stat-value text-3xl font-bold">{{ number_format($stats['publishedPosts']) }}</div>
                    <div class="stat-desc text-xs">Live articles</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Pending Posts -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-warning">
                        <div class="p-3 rounded-lg bg-warning/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Pending Review</div>
                    <div class="stat-value text-2xl font-bold">{{ number_format($stats['pendingPosts']) }}</div>
                    <div class="stat-desc text-xs">Awaiting approval</div>
                </div>
            </div>
        </div>

        <!-- Total Views -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-secondary">
                        <div class="p-3 rounded-lg bg-secondary/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Total Views</div>
                    <div class="stat-value text-2xl font-bold">{{ number_format($stats['totalViews']) }}</div>
                    <div class="stat-desc text-xs">All time views</div>
                </div>
            </div>
        </div>

        <!-- Total Shares -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-error">
                        <div class="p-3 rounded-lg bg-error/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Social Shares</div>
                    <div class="stat-value text-2xl font-bold">{{ number_format($stats['totalShares']) }}</div>
                    <div class="stat-desc text-xs">Content shared</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!-- Manage Users -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-3 rounded-lg bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Manage Users</h2>
                </div>
                <p class="text-sm text-base-content/70 mb-4">View, edit, and manage user accounts and roles</p>
                <div class="card-actions">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-block gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Manage Users
                    </a>
                </div>
            </div>
        </div>

        <!-- Manage Categories -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-3 rounded-lg bg-accent/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Manage Categories</h2>
                </div>
                <p class="text-sm text-base-content/70 mb-4">Organize and manage news categories</p>
                <div class="card-actions">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-accent btn-block gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Manage Categories
                    </a>
                </div>
            </div>
        </div>

        <!-- View Analytics -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-3 rounded-lg bg-info/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">View Analytics</h2>
                </div>
                <p class="text-sm text-base-content/70 mb-4">Track social shares and content performance</p>
                <div class="card-actions">
                    <a href="{{ route('admin.analytics') }}" class="btn btn-info btn-block gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        View Analytics
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity / Quick Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Recent Users -->
        <div class="card bg-base-100 shadow-lg border border-base-300">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-secondary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">User Roles</h2>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-primary badge-lg">Admin</div>
                            <span class="text-sm font-medium">{{ $stats['adminUsers'] }} users</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-warning badge-lg">Editor</div>
                            <span class="text-sm font-medium">{{ $stats['editorUsers'] }} users</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-info badge-lg">User</div>
                            <span class="text-sm font-medium">{{ $stats['regularUsers'] }} users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Post Status Overview -->
        <div class="card bg-base-100 shadow-lg border border-base-300">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-success/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Post Status</h2>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-success badge-lg">Published</div>
                            <span class="text-sm font-medium">{{ number_format($stats['publishedPosts']) }} posts</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-warning badge-lg">Pending</div>
                            <span class="text-sm font-medium">{{ number_format($stats['pendingPosts']) }} posts</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-base-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="badge badge-info badge-lg">Approved</div>
                            <span class="text-sm font-medium">{{ number_format($stats['approvedPosts']) }} posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

