@extends('backend.layouts.app')

@section('title', 'Campus Page Management')
@section('breadcrumb', 'Admin / Page Management / Campus')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Campus Page Settings 🏛️</h2>
                <p class="text-gray-500 mt-1">Manage the layout and content of your Campus gallery page.</p>
            </div>
            <a href="{{ route('admin.campuses.index') }}"
                class="bg-primary hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-sm transition-all duration-200 flex items-center">
                <i class="fas fa-university mr-2"></i> Manage Campuses
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'campus') }}" method="POST" enctype="multipart/form-data"
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
                                <input type="text" name="campus_banner_heading"
                                    value="{{ $settings['campus_banner_heading'] ?? 'Our World-Class Campuses' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="campus_banner_subheading"
                                    value="{{ $settings['campus_banner_subheading'] ?? 'Experience a vibrant learning environment equipped with modern facilities.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['campus_banner_image']) && !empty($settings['campus_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['campus_banner_image']) }}" alt="Campus Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="campus_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📝 Page Header Content
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Section Main Heading</label>
                            <input type="text" name="campus_section_heading"
                                value="{{ $settings['campus_section_heading'] ?? 'Explore Our <span>Learning Hubs</span>' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            <p class="text-xs text-info mt-1">Use &lt;span&gt;...&lt;/span&gt; for highlighted text.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Section Intro Text</label>
                            <textarea name="campus_section_subheading" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['campus_section_subheading'] ?? 'Our campuses are strategically located to provide students with a conducive environment for both academic and personal growth.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📣 Call to Action Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">CTA Heading</label>
                            <input type="text" name="campus_cta_heading"
                                value="{{ $settings['campus_cta_heading'] ?? 'Visit Our <span>Campus Today</span>' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">CTA Sub-heading</label>
                            <input type="text" name="campus_cta_subheading"
                                value="{{ $settings['campus_cta_subheading'] ?? 'Take a tour and experience the professional atmosphere that will shape your future.' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'campus'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Campus Page Content
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