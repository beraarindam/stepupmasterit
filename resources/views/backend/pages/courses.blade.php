@extends('backend.layouts.app')

@section('title', 'Courses Page Management')
@section('breadcrumb', 'Admin / Page Management / Courses')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Courses Page Settings 🛠️</h2>
                <p class="text-gray-500 mt-1">Manage the header and configuration for your Courses listing page.</p>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('admin.course-categories.index') }}"
                    class="flex items-center text-primary hover:text-blue-700 font-semibold transition-colors">
                    <i class="fas fa-tags mr-2"></i> Categories
                </a>
                <a href="{{ route('admin.courses.index') }}"
                    class="flex items-center text-primary hover:text-blue-700 font-semibold transition-colors">
                    <i class="fas fa-book mr-2"></i> All Courses
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'courses') }}" method="POST" enctype="multipart/form-data"
                class="p-6">
                @csrf

                <!-- Banner Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        🚩 Banner Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Heading</label>
                                <input type="text" name="courses_banner_heading"
                                    value="{{ $settings['courses_banner_heading'] ?? 'Our Professional Courses' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="courses_banner_subheading"
                                    value="{{ $settings['courses_banner_subheading'] ?? 'Elevate your skills with our industry-leading certification programs.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['courses_banner_image']) && !empty($settings['courses_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['courses_banner_image']) }}" alt="Courses Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="courses_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'courses'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Courses Page Content
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
@endsection