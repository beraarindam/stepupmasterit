@extends('backend.layouts.app')

@section('title', 'Privacy Policy Page Management')
@section('breadcrumb', 'Admin / Page Management / Privacy')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Privacy Policy Settings 🔒</h2>
                <p class="text-gray-500 mt-1">Manage all the content specifically for your Privacy Policy page.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'privacy') }}" method="POST" enctype="multipart/form-data"
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
                                <input type="text" name="privacy_banner_heading"
                                    value="{{ $settings['privacy_banner_heading'] ?? 'Privacy Policy' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="privacy_banner_subheading"
                                    value="{{ $settings['privacy_banner_subheading'] ?? 'Your privacy and data security are our top priorities.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['privacy_banner_image']) && !empty($settings['privacy_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['privacy_banner_image']) }}" alt="Privacy Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="privacy_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📝 Main Content
                    </h4>
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Privacy Policy Details</label>
                        <textarea name="privacy_content" rows="15"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none editor"
                            placeholder="Enter the full privacy policy text here...">{{ $settings['privacy_content'] ?? '' }}</textarea>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'privacy'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Privacy Content
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