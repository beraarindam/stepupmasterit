@extends('backend.layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Admin / Dashboard')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <!-- Welcome Header -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Welcome back, Admin! 👋</h2>
                <p class="text-gray-500 mt-1">Here's an overview of your education portal today.</p>
            </div>
            <div class="hidden md:block">
                <span class="bg-primary/10 text-primary px-4 py-2 rounded-lg font-semibold text-sm">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ date('F d, Y') }}
                </span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 mt-4 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Students</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalStudents }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 text-xl">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Courses</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeCourses }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 text-xl">
                        <i class="fas fa-layer-group"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Services</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalServices }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center text-purple-500 text-xl">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Blogs</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalBlogs }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 text-xl">
                        <i class="fas fa-newspaper"></i>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Admins</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalAdmins }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center text-red-500 text-xl">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Campuses</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalCampuses }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-teal-50 flex items-center justify-center text-teal-500 text-xl">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Galleries</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeGalleries }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 text-xl">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>

            <!-- Card 8 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active FAQs</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeFaqs }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-500 text-xl">
                        <i class="fas fa-question-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Card 9 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Banners</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeBanners }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-lime-50 flex items-center justify-center text-lime-500 text-xl">
                        <i class="fas fa-image"></i>
                    </div>
                </div>
            </div>

            <!-- Card 10 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Active Testimonials</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeTestimonials }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-cyan-50 flex items-center justify-center text-cyan-500 text-xl">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-history text-gray-400"></i> Recent Student Account Registrations
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="px-6 py-4 font-medium">Student Info</th>
                            <th class="px-6 py-4 font-medium">Email</th>
                            <th class="px-6 py-4 font-medium">Joined Date</th>
                            <th class="px-6 py-4 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($recentStudents as $student)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($student->avatar)
                                            <img src="{{ asset($student->avatar) }}" class="w-8 h-8 rounded-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=EBF4FF&color=3B82F6"
                                                class="w-8 h-8 rounded-full">
                                        @endif
                                        <span class="font-medium text-gray-800">{{ $student->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $student->email }}</td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $student->created_at ? $student->created_at->diffForHumans() : 'Unknown' }}</td>
                                <td class="px-6 py-4">
                                    @if($student->status == 'active')
                                        <span
                                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>
                                    @elseif($student->status == 'inactive')
                                        <span
                                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>
                                    @else
                                        <span
                                            class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ ucfirst($student->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    No recent students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
@endsection