@extends('layouts.admin')

@section('title', 'Social Share Analytics')

@section('breadcrumbs')
    <li class="text-base-content/70">Analytics</li>
@endsection

@section('content')
<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl lg:text-4xl font-bold mb-2">Social Share Analytics</h1>
        <p class="text-base-content/70">Comprehensive insights into your content sharing performance</p>
    </div>

    <!-- Filters - Modern Card -->
    <div class="card bg-base-100 shadow-lg border border-base-300 mb-6">
        <div class="card-body p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 rounded-lg bg-primary/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </div>
                <h2 class="card-title text-lg">Filters & Search</h2>
            </div>
            <form method="GET" action="{{ route('admin.analytics') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Start Date</span>
                    </label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="input input-bordered w-full">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">End Date</span>
                    </label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="input input-bordered w-full">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Platform</span>
                    </label>
                    <select name="platform" class="select select-bordered w-full">
                        <option value="all" {{ $platform === 'all' || !$platform ? 'selected' : '' }}>All Platforms</option>
                        <option value="facebook" {{ $platform === 'facebook' ? 'selected' : '' }}>Facebook</option>
                        <option value="twitter" {{ $platform === 'twitter' ? 'selected' : '' }}>X (Twitter)</option>
                        <option value="whatsapp" {{ $platform === 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                        <option value="telegram" {{ $platform === 'telegram' ? 'selected' : '' }}>Telegram</option>
                        <option value="email" {{ $platform === 'email' ? 'selected' : '' }}>Email</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Page Type</span>
                    </label>
                    <select name="page_type" class="select select-bordered w-full">
                        <option value="all" {{ $pageType === 'all' || !$pageType ? 'selected' : '' }}>All Pages</option>
                        <option value="home" {{ $pageType === 'home' ? 'selected' : '' }}>Home</option>
                        <option value="news" {{ $pageType === 'news' ? 'selected' : '' }}>News Articles</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">Category</span>
                    </label>
                    <select name="category_id" class="select select-bordered w-full">
                        <option value="all" {{ $categoryId === 'all' || !$categoryId ? 'selected' : '' }}>All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-5 flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Apply Filters
                    </button>
                    <a href="{{ route('admin.analytics') }}" class="btn btn-outline gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Grid - Modern Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Shares - Hero Card -->
        <div class="card bg-gradient-to-br from-primary via-primary to-primary-focus text-primary-content shadow-xl lg:col-span-2 lg:row-span-2 hover:shadow-2xl transition-shadow">
            <div class="card-body justify-between">
                <div class="stat p-0">
                    <div class="stat-figure opacity-20 absolute right-4 top-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </div>
                    <div class="stat-title text-primary-content/80 text-sm font-medium uppercase tracking-wide">Total Shares</div>
                    <div class="stat-value text-5xl lg:text-6xl font-bold">{{ number_format($totalShares) }}</div>
                    <div class="stat-desc text-primary-content/70 mt-2">All time shares tracked</div>
                </div>
            </div>
        </div>

        <!-- Platforms Card -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-secondary">
                        <div class="p-3 rounded-lg bg-secondary/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Platforms</div>
                    <div class="stat-value text-3xl font-bold">{{ count($sharesByPlatform) }}</div>
                    <div class="stat-desc text-xs">Active platforms</div>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
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
                    <div class="stat-value text-3xl font-bold">{{ count($sharesByCategory) }}</div>
                    <div class="stat-desc text-xs">With shares</div>
                </div>
            </div>
        </div>

        <!-- Top Pages Card -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="stat p-0">
                    <div class="stat-figure text-info">
                        <div class="p-3 rounded-lg bg-info/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="stat-title text-xs font-medium text-base-content/70">Top Pages</div>
                    <div class="stat-value text-3xl font-bold">{{ $topPages->count() }}</div>
                    <div class="stat-desc text-xs">Tracked pages</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <!-- Shares by Platform - Large Chart -->
        <div class="card bg-base-100 shadow-lg border border-base-300 lg:col-span-2 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Shares by Platform</h2>
                </div>
                <canvas id="platformChart" style="max-height: 350px;"></canvas>
            </div>
        </div>

        <!-- Shares by Category - Small Chart -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-accent/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">By Category</h2>
                </div>
                <canvas id="categoryChart" style="max-height: 350px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Time Series and Page Type -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <!-- Shares Over Time -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-info/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Shares Over Time</h2>
                </div>
                <canvas id="timeChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <!-- Shares by Page Type -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-secondary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">By Page Type</h2>
                </div>
                <canvas id="pageTypeChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Pivot Charts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <!-- Platform vs Category -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-warning/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Platform vs Category</h2>
                </div>
                <canvas id="platformCategoryChart" style="max-height: 400px;"></canvas>
            </div>
        </div>

        <!-- Platform vs Page Type -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-success/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Platform vs Page Type</h2>
                </div>
                <canvas id="platformPageTypeChart" style="max-height: 400px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Pivot Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <!-- Platform × Category Matrix -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-error/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Platform × Category Matrix</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra table-sm">
                        <thead>
                            <tr>
                                <th class="font-semibold">Platform</th>
                                @php
                                    $allCategories = [];
                                    if (!empty($platformCategoryPivot)) {
                                        foreach ($platformCategoryPivot as $platformData) {
                                            if (is_array($platformData)) {
                                                $allCategories = array_merge($allCategories, array_keys($platformData));
                                            }
                                        }
                                        $allCategories = array_unique($allCategories);
                                    }
                                @endphp
                                @foreach($allCategories as $cat)
                                    <th class="text-center font-semibold">{{ $cat }}</th>
                                @endforeach
                                <th class="text-center font-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($allCategories))
                                @foreach($sharesByPlatform as $platform => $total)
                                    <tr>
                                        <td class="font-semibold">{{ ucfirst($platform) }}</td>
                                        @foreach($allCategories as $cat)
                                            <td class="text-center">
                                                {{ isset($platformCategoryPivot[$platform][$cat]) ? number_format($platformCategoryPivot[$platform][$cat]) : '-' }}
                                            </td>
                                        @endforeach
                                        <td class="text-center font-bold">{{ number_format($total) }}</td>
                                    </tr>
                                @endforeach
                                <tr class="font-bold bg-base-200">
                                    <td class="text-base-content">Total</td>
                                    @foreach($allCategories as $cat)
                                        <td class="text-center text-base-content">
                                            {{ number_format(collect($platformCategoryPivot)->sum(function($platform) use ($cat) {
                                                return $platform[$cat] ?? 0;
                                            })) }}
                                        </td>
                                    @endforeach
                                    <td class="text-center text-base-content">{{ number_format($totalShares) }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">No category data available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Platform × Page Type Matrix -->
        <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-lg bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-lg">Platform × Page Type Matrix</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra table-sm">
                        <thead>
                            <tr>
                                <th class="font-semibold">Platform</th>
                                <th class="text-center font-semibold">Home</th>
                                <th class="text-center font-semibold">News</th>
                                <th class="text-center font-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sharesByPlatform as $platform => $total)
                                <tr>
                                    <td class="font-semibold">{{ ucfirst($platform) }}</td>
                                    <td class="text-center">
                                        {{ isset($platformPageTypePivot[$platform]['home']) ? number_format($platformPageTypePivot[$platform]['home']) : '-' }}
                                    </td>
                                    <td class="text-center">
                                        {{ isset($platformPageTypePivot[$platform]['news']) ? number_format($platformPageTypePivot[$platform]['news']) : '-' }}
                                    </td>
                                    <td class="text-center font-bold">{{ number_format($total) }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-bold bg-base-200">
                                <td class="text-base-content">Total</td>
                                <td class="text-center text-base-content">
                                    {{ number_format(collect($platformPageTypePivot)->sum(function($platform) {
                                        return $platform['home'] ?? 0;
                                    })) }}
                                </td>
                                <td class="text-center text-base-content">
                                    {{ number_format(collect($platformPageTypePivot)->sum(function($platform) {
                                        return $platform['news'] ?? 0;
                                    })) }}
                                </td>
                                <td class="text-center text-base-content">{{ number_format($totalShares) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Shared Pages - Full Width -->
    <div class="card bg-base-100 shadow-lg border border-base-300 hover:shadow-xl transition-shadow">
        <div class="card-body">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 rounded-lg bg-info/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="card-title text-lg">Top Shared Pages</h2>
            </div>
                <div class="overflow-x-auto">
                <table class="table table-zebra table-hover">
                    <thead>
                        <tr class="bg-base-200">
                            <th class="font-semibold">Rank</th>
                            <th class="font-semibold">Page Title / URL</th>
                            <th class="font-semibold">Category</th>
                            <th class="text-right font-semibold">Share Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topPages as $index => $page)
                            <tr>
                                <td class="font-bold">#{{ $index + 1 }}</td>
                                <td>
                                    <div class="flex flex-col">
                                        <span class="font-semibold">{{ $page['title'] }}</span>
                                        <a href="{{ $page['page_url'] }}" target="_blank" class="link link-primary text-xs">
                                            {{ Str::limit($page['page_url'], 60) }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if($page['category'])
                                        <span class="badge badge-primary">{{ $page['category'] }}</span>
                                    @else
                                        <span class="badge badge-ghost">N/A</span>
                                    @endif
                                </td>
                                <td class="text-right font-bold">{{ number_format($page['share_count']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Get theme colors from CSS variables or use DaisyUI defaults
    const getThemeColor = (color, opacity = 1) => {
        const colors = {
            primary: 'rgba(99, 102, 241, ' + opacity + ')',      // indigo
            secondary: 'rgba(16, 185, 129, ' + opacity + ')',   // emerald
            accent: 'rgba(251, 191, 36, ' + opacity + ')',      // amber
            info: 'rgba(59, 130, 246, ' + opacity + ')',        // blue
            success: 'rgba(34, 197, 94, ' + opacity + ')',      // green
            warning: 'rgba(251, 191, 36, ' + opacity + ')',     // amber
            error: 'rgba(239, 68, 68, ' + opacity + ')',        // red
        };
        return colors[color] || colors.primary;
    };

    // Color palette using DaisyUI theme colors
    const colors = {
        primary: [getThemeColor('primary', 0.8), getThemeColor('secondary', 0.8), getThemeColor('accent', 0.8), getThemeColor('info', 0.8), getThemeColor('warning', 0.8)],
        border: [getThemeColor('primary', 1), getThemeColor('secondary', 1), getThemeColor('accent', 1), getThemeColor('info', 1), getThemeColor('warning', 1)],
        category: [getThemeColor('primary', 0.8), getThemeColor('secondary', 0.8), getThemeColor('accent', 0.8), getThemeColor('info', 0.8), getThemeColor('warning', 0.8), getThemeColor('error', 0.8)]
    };

    // Platform Chart Data
    const platformData = @json($sharesByPlatform);
    const platformLabels = Object.keys(platformData);
    const platformValues = Object.values(platformData);

    // Category Chart Data
    const categoryData = @json($sharesByCategory);
    const categoryLabels = Object.keys(categoryData);
    const categoryValues = Object.values(categoryData);

    // Time Chart Data
    const timeData = @json($sharesOverTime);
    const timeLabels = Object.keys(timeData);
    const timeValues = Object.values(timeData);

    // Page Type Chart Data
    const pageTypeData = @json($sharesByPageType);
    const pageTypeLabels = Object.keys(pageTypeData);
    const pageTypeValues = Object.values(pageTypeData);

    // Pivot Data
    const platformCategoryPivot = @json($platformCategoryPivot);
    const platformPageTypePivot = @json($platformPageTypePivot);

    // Platform Chart (Staggered Bar Chart)
    const platformCtx = document.getElementById('platformChart').getContext('2d');
    new Chart(platformCtx, {
        type: 'bar',
        data: {
            labels: platformLabels.map(label => label.charAt(0).toUpperCase() + label.slice(1)),
            datasets: [{
                label: 'Shares',
                data: platformValues,
                backgroundColor: colors.primary.slice(0, platformLabels.length),
                borderColor: colors.border.slice(0, platformLabels.length),
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 13 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Category Chart (Doughnut Chart)
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryValues,
                backgroundColor: colors.category.slice(0, categoryLabels.length),
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 11 }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12
                }
            },
            animation: {
                animateRotate: true,
                duration: 1500
            }
        }
    });

    // Time Chart (Line Chart with Area)
    const timeCtx = document.getElementById('timeChart').getContext('2d');
    new Chart(timeCtx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Shares',
                data: timeValues,
                borderColor: getThemeColor('primary', 1),
                backgroundColor: getThemeColor('primary', 0.1),
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: '#fff',
                pointBorderColor: getThemeColor('primary', 1),
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Page Type Chart (Pie Chart)
    const pageTypeCtx = document.getElementById('pageTypeChart').getContext('2d');
    new Chart(pageTypeCtx, {
        type: 'pie',
        data: {
            labels: pageTypeLabels.map(label => label ? label.charAt(0).toUpperCase() + label.slice(1) : 'Unknown'),
            datasets: [{
                data: pageTypeValues,
                backgroundColor: [getThemeColor('primary', 0.8), getThemeColor('secondary', 0.8), getThemeColor('accent', 0.8)],
                borderColor: [getThemeColor('primary', 1), getThemeColor('secondary', 1), getThemeColor('accent', 1)],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12
                }
            },
            animation: {
                animateRotate: true,
                duration: 1500
            }
        }
    });

    // Platform vs Category Pivot Chart (Grouped Bar)
    const platformCategoryCtx = document.getElementById('platformCategoryChart').getContext('2d');
    const allCategories = Object.keys(platformCategoryPivot).length > 0 
        ? [...new Set(Object.values(platformCategoryPivot).flatMap(p => Object.keys(p || {})))]
        : [];
    const platformCategoryDatasets = allCategories.map((category, idx) => {
        return {
            label: category,
            data: platformLabels.map(platform => platformCategoryPivot[platform]?.[category] || 0),
            backgroundColor: colors.category[idx % colors.category.length],
            borderColor: colors.border[idx % colors.border.length],
            borderWidth: 1
        };
    });

    if (allCategories.length > 0) {
        new Chart(platformCategoryCtx, {
            type: 'bar',
            data: {
                labels: platformLabels.map(l => l.charAt(0).toUpperCase() + l.slice(1)),
                datasets: platformCategoryDatasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 10,
                            font: { size: 11 },
                            boxWidth: 12
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
    } else {
        // Show message if no data
        platformCategoryCtx.canvas.parentElement.innerHTML = '<div class="text-center text-base-content/50 p-8">No category data available</div>';
    }

    // Platform vs Page Type Pivot Chart (Grouped Bar)
    const platformPageTypeCtx = document.getElementById('platformPageTypeChart').getContext('2d');
    const pageTypes = ['home', 'news'];
    const platformPageTypeDatasets = pageTypes.map((pageType, idx) => {
        return {
            label: pageType.charAt(0).toUpperCase() + pageType.slice(1),
            data: platformLabels.map(platform => platformPageTypePivot[platform]?.[pageType] || 0),
            backgroundColor: idx === 0 ? getThemeColor('primary', 0.8) : getThemeColor('secondary', 0.8),
            borderColor: idx === 0 ? getThemeColor('primary', 1) : getThemeColor('secondary', 1),
            borderWidth: 1
        };
    });

    new Chart(platformPageTypeCtx, {
        type: 'bar',
        data: {
            labels: platformLabels.map(l => l.charAt(0).toUpperCase() + l.slice(1)),
            datasets: platformPageTypeDatasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                x: {
                    stacked: false,
                    grid: {
                        display: false
                    }
                },
                y: {
                    stacked: false,
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>
@endpush
@endsection
