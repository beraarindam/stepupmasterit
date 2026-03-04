<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Education CMS</title>
    <!-- Tailwind CSS (via CDN for quick prototyping) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#1e293b',
                    }
                }
            }
        }
    </script>
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.4rem 0.8rem;
        }

        table.dataTable {
            border-collapse: collapse !important;
            width: 100% !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-secondary text-white hidden md:flex flex-col">
        <div class="h-16 flex items-center justify-center font-bold text-xl tracking-wider shadow-md bg-gray-900">
            EDU CMS ADMIN
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-2 px-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-tachometer-alt w-5"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-white/5 text-gray-300 transition-colors">
                        <i class="fas fa-users w-5"></i>
                        Users Management
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.courses.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.courses.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-book w-5"></i>
                        Courses
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-briefcase w-5"></i>
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.campuses.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.campuses.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-building w-5"></i>
                        Campus
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.blogs.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-newspaper w-5"></i>
                        Blogs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galleries.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.galleries.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-images w-5"></i>
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faqs.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.faqs.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-question-circle w-5"></i>
                        FAQs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.banners.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.banners.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-image w-5"></i>
                        Banners
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.testimonials.*') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-comment-dots w-5"></i>
                        Testimonials
                    </a>
                </li>
                <!-- Page Management -->
                <li x-data="{ open: {{ request()->routeIs('admin.pages.*') ? 'true' : 'false' }} }">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg hover:bg-white/5 text-gray-300 transition-colors {{ request()->routeIs('admin.pages.*') ? 'bg-primary/10 text-primary font-medium' : '' }}">
                        <span class="flex items-center gap-3">
                            <i class="fas fa-file-alt w-5"></i>
                            Page Management
                        </span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <ul x-show="open" x-transition class="mt-1 ml-4 space-y-1 border-l border-gray-700 pl-3">
                        <li>
                            <a href="{{ route('admin.pages.home') }}"
                                class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.pages.home') ? 'bg-primary/20 text-primary font-semibold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-colors">
                                <i class="fas fa-home text-xs w-4"></i> Home Page
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pages.about') }}"
                                class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm {{ request()->routeIs('admin.pages.about') ? 'bg-primary/20 text-primary font-semibold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-colors">
                                <i class="fas fa-info-circle text-xs w-4"></i> About Us
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.settings.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.settings.index') ? 'bg-primary/10 text-primary font-medium' : 'hover:bg-white/5 text-gray-300' }} transition-colors">
                        <i class="fas fa-cog w-5"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-4 bg-gray-900 border-t border-gray-800">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin User') }}&background=0D8ABC&color=fff"
                    alt="Admin" class="w-10 h-10 rounded-full border-2 border-primary">
                <div>
                    <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'Admin User' }}</p>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-xs text-gray-400 cursor-pointer hover:text-white transition-colors">Sign
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen relative">
        <!-- Header -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
            <button class="md:hidden text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="text-gray-500 text-sm font-medium">
                @yield('breadcrumb', 'Dashboard')
            </div>
            <div class="flex items-center gap-4">
                <div class="relative cursor-pointer text-gray-500 hover:text-primary transition-colors mt-1">
                    <i class="fas fa-bell text-xl"></i>
                    <span
                        class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white">3</span>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative ml-2" x-data="{ open: false }">
                    <div @click="open = !open" @click.away="open = false"
                        class="flex items-center gap-3 cursor-pointer border-l border-gray-200 pl-4 select-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=0D8ABC&color=fff"
                            class="w-9 h-9 rounded-full border border-gray-200 shadow-sm">
                        <div class="hidden sm:block text-left relative top-[2px]">
                            <span
                                class="block text-sm font-bold text-gray-700 leading-tight">{{ auth()->user()->name ?? 'Admin User' }}</span>
                            <span
                                class="block text-[11px] font-medium text-gray-500 mt-0 pt-0 capitalize">{{ auth()->user()->role ?? 'Administrator' }}</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-400 ml-1"></i>
                    </div>

                    <div x-show="open" x-transition.opacity style="display: none;"
                        class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                        <div class="px-4 py-3 border-b border-gray-50 mb-1 bg-gray-50/50">
                            <p class="text-sm font-bold text-gray-800">{{ auth()->user()->name ?? 'Admin User' }}</p>
                            <p class="text-xs text-gray-500 truncate mt-0.5">{{ auth()->user()->email ??
                                'admin@example.com' }}</p>
                        </div>
                        <a href="#"
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors font-medium relative group">
                            <i class="fas fa-user w-5 text-gray-400 group-hover:text-primary transition-colors"></i> My
                            Profile
                        </a>
                        <a href="#"
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors font-medium relative group">
                            <i class="fas fa-key w-5 text-gray-400 group-hover:text-primary transition-colors"></i>
                            Change Password
                        </a>
                        <div class="border-t border-gray-100 mt-1 pt-1">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                                    <i class="fas fa-sign-out-alt w-5 text-red-500"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Content -->
        <main class="flex-1 overflow-y-auto p-6 scroll-smooth">
            @yield('content')
        </main>
    </div>

</body>

</html>