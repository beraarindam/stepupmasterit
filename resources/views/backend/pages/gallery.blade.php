@extends('backend.layouts.app')

@section('title', 'Gallery Page Management')
@section('breadcrumb', 'Admin / Page Management / Gallery')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Gallery Page Settings 🖼️</h2>
                <p class="text-gray-500 mt-1">Manage all the content specifically for your Gallery page.</p>
            </div>
            <a href="{{ route('admin.galleries.index') }}"
                class="flex items-center text-primary hover:text-blue-700 font-semibold transition-colors">
                <i class="fas fa-images mr-2"></i> Manage Gallery Photos
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'gallery') }}" method="POST" enctype="multipart/form-data"
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
                                <input type="text" name="gallery_banner_heading"
                                    value="{{ $settings['gallery_banner_heading'] ?? 'Our Gallery' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="gallery_banner_subheading"
                                    value="{{ $settings['gallery_banner_subheading'] ?? 'Moments of success and learning at Step Up Master IT.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['gallery_banner_image']) && !empty($settings['gallery_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['gallery_banner_image']) }}" alt="Gallery Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="gallery_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>

                        <!-- Section Content -->
                        <div class="mb-8">
                            <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                                📁 Section Content
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Heading</label>
                                    <input type="text" name="gallery_section_heading"
                                        value="{{ $settings['gallery_section_heading'] ?? 'Glimpse of Our Campus Life' }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Sub-heading</label>
                                    <textarea name="gallery_section_subheading" rows="2"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['gallery_section_subheading'] ?? 'Explore the vibrant atmosphere, modern classrooms, and successful student projects that define our institution.' }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- SEO Section -->
                        @include('backend.pages.seo_partial', ['page' => 'gallery'])

                        <div class="pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit"
                                class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                                <i class="fas fa-save mr-2"></i> Update Gallery Page Content
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