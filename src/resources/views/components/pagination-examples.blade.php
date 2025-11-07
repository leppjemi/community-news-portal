{{-- 
    DaisyUI 5 Pagination Component Examples
    
    This file demonstrates various pagination styles using DaisyUI 5 components.
    The pagination component is automatically applied to all Laravel pagination links.
--}}

<div class="container mx-auto p-8 space-y-12">
    <div class="prose max-w-none">
        <h1 class="text-4xl font-bold mb-4">DaisyUI 5 Pagination Component</h1>
        <p class="text-lg text-base-content/70 mb-8">
            This page demonstrates the DaisyUI 5 pagination component used throughout the application.
        </p>
    </div>

    {{-- Basic Pagination Example --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Basic Pagination</h2>
            <p class="mb-6">Standard pagination with previous/next buttons and page numbers:</p>
            <div class="flex justify-center">
                <div class="join">
                    <button class="join-item btn btn-disabled" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="join-item btn btn-active">1</button>
                    <a href="#" class="join-item btn">2</a>
                    <a href="#" class="join-item btn">3</a>
                    <a href="#" class="join-item btn">4</a>
                    <a href="#" class="join-item btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination with Ellipsis --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Pagination with Ellipsis</h2>
            <p class="mb-6">Pagination showing ellipsis for large page ranges:</p>
            <div class="flex justify-center">
                <div class="join">
                    <a href="#" class="join-item btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <a href="#" class="join-item btn">1</a>
                    <a href="#" class="join-item btn">2</a>
                    <button class="join-item btn btn-active">3</button>
                    <a href="#" class="join-item btn">4</a>
                    <button class="join-item btn btn-disabled" disabled>...</button>
                    <a href="#" class="join-item btn">99</a>
                    <a href="#" class="join-item btn">100</a>
                    <a href="#" class="join-item btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Different Sizes --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Pagination Sizes</h2>
            <p class="mb-6">DaisyUI 5 supports different button sizes:</p>
            <div class="space-y-6">
                <div>
                    <p class="text-sm font-semibold mb-2">Extra Small (btn-xs)</p>
                    <div class="flex justify-center">
                        <div class="join">
                            <button class="join-item btn btn-xs">1</button>
                            <button class="join-item btn btn-xs btn-active">2</button>
                            <button class="join-item btn btn-xs">3</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold mb-2">Small (btn-sm) - Default</p>
                    <div class="flex justify-center">
                        <div class="join">
                            <button class="join-item btn btn-sm">1</button>
                            <button class="join-item btn btn-sm btn-active">2</button>
                            <button class="join-item btn btn-sm">3</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold mb-2">Medium (btn-md)</p>
                    <div class="flex justify-center">
                        <div class="join">
                            <button class="join-item btn btn-md">1</button>
                            <button class="join-item btn btn-md btn-active">2</button>
                            <button class="join-item btn btn-md">3</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold mb-2">Large (btn-lg)</p>
                    <div class="flex justify-center">
                        <div class="join">
                            <button class="join-item btn btn-lg">1</button>
                            <button class="join-item btn btn-lg btn-active">2</button>
                            <button class="join-item btn btn-lg">3</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Usage in Laravel --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Usage in Laravel</h2>
            <p class="mb-4">The pagination component is automatically applied to all Laravel pagination links:</p>
            <div class="mockup-code">
                <pre><code>@if($posts->hasPages())
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endif</code></pre>
            </div>
            <div class="divider"></div>
            <p class="mb-4">The component uses the following DaisyUI 5 classes:</p>
            <ul class="list-disc list-inside space-y-2 text-sm">
                <li><code class="bg-base-200 px-2 py-1 rounded">join</code> - Container for grouped buttons</li>
                <li><code class="bg-base-200 px-2 py-1 rounded">join-item</code> - Individual button in the group</li>
                <li><code class="bg-base-200 px-2 py-1 rounded">btn</code> - Base button styling</li>
                <li><code class="bg-base-200 px-2 py-1 rounded">btn-active</code> - Active/current page</li>
                <li><code class="bg-base-200 px-2 py-1 rounded">btn-disabled</code> - Disabled state</li>
            </ul>
        </div>
    </div>

    {{-- Features --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Features</h2>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <strong>Automatic styling</strong> - All pagination links use DaisyUI 5 styling automatically
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <strong>Accessible</strong> - Includes proper ARIA labels and semantic HTML
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <strong>Responsive</strong> - Works seamlessly on all screen sizes
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-success flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <strong>Theme-aware</strong> - Automatically adapts to your DaisyUI theme
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


