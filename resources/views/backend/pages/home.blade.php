@extends('backend.layouts.app')

@section('title', 'Home Page Management')
@section('breadcrumb', 'Admin / Page Management / Home')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Home Page Settings 🏠</h2>
                <p class="text-gray-500 mt-1">Manage all the dynamic content specifically for your homepage.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.home.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <!-- Who We Are -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📖 "Who We Are" Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Heading</label>
                                <input type="text" name="home_about_heading"
                                    value="{{ $settings['home_about_heading'] ?? 'Who We Are' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                    placeholder="e.g. Who We Are">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sub-heading</label>
                                <input type="text" name="home_about_subheading"
                                    value="{{ $settings['home_about_subheading'] ?? 'About Our Institution' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                    placeholder="e.g. About Our Institution">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="home_about_description" rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none editor"
                                    placeholder="Main about us paragraph...">{{ $settings['home_about_description'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button Text</label>
                                <input type="text" name="home_about_btn_text"
                                    value="{{ $settings['home_about_btn_text'] ?? 'Learn More About Us' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button Link</label>
                                <input type="text" name="home_about_btn_link"
                                    value="{{ $settings['home_about_btn_link'] ?? '#' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                    placeholder="e.g. /about">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Highlight Points (one per
                                    line)</label>
                                <textarea name="home_about_highlights" rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                    placeholder="Certified Professional Instructors&#10;Comprehensive Learning Materials&#10;Industry-Recognized Certifications&#10;Career Placement Support">{{ $settings['home_about_highlights'] ?? "Certified Professional Instructors\nComprehensive Learning Materials\nIndustry-Recognized Certifications\nCareer Placement Support" }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Enter each highlight on a new line. For About page cards: use <code>Title|Description</code> for custom descriptions (e.g. Academic Pathway|Guidance for students.).</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">About Section Image</label>
                        @if(isset($settings['home_about_image']) && !empty($settings['home_about_image']))
                            <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                <img src="{{ asset($settings['home_about_image']) }}" alt="About Image"
                                    class="h-24 object-contain">
                            </div>
                        @endif
                        <input type="file" name="home_about_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        <p class="text-xs text-gray-500 mt-1">Leave blank to keep current image.</p>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📊 Statistics / Counter Section
                    </h4>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Heading</label>
                        <input type="text" name="home_stats_heading"
                            value="{{ $settings['home_stats_heading'] ?? 'Empowering Students Worldwide' }}"
                            class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach([1, 2, 3, 4] as $i)
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                                <p class="text-xs font-bold text-gray-500 uppercase mb-3 text-center border-b pb-1">Stat
                                    {{ $i }}
                                </p>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1 font-semibold">Value</label>
                                        <input type="text" name="home_stat{{ $i }}_value"
                                            value="{{ $settings['home_stat' . $i . '_value'] ?? '' }}"
                                            class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-lg outline-none focus:ring-1 focus:ring-primary"
                                            placeholder="e.g. 36">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1 font-semibold">Label</label>
                                        <input type="text" name="home_stat{{ $i }}_label"
                                            value="{{ $settings['home_stat' . $i . '_label'] ?? '' }}"
                                            class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-lg outline-none focus:ring-1 focus:ring-primary"
                                            placeholder="e.g. Courses">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-600 mb-1 font-semibold">Suffix</label>
                                        <input type="text" name="home_stat{{ $i }}_suffix"
                                            value="{{ $settings['home_stat' . $i . '_suffix'] ?? '' }}"
                                            class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-lg outline-none focus:ring-1 focus:ring-primary"
                                            placeholder="e.g. +">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Section Headings -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        🏷️ Other Section Headings
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <h5 class="text-sm font-bold text-gray-600 mb-3"><i class="fas fa-briefcase mr-2"></i> Services
                                Section</h5>
                            <div class="space-y-4">
                                <div class="mb-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Heading</label>
                                    <input type="text" name="home_services_heading"
                                        value="{{ $settings['home_services_heading'] ?? 'Our Specialized Services' }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Sub-heading</label>
                                    <textarea name="home_services_subheading" rows="3"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['home_services_subheading'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <h5 class="text-sm font-bold text-gray-600 mb-3"><i class="fas fa-book mr-2"></i> Courses
                                Section</h5>
                            <div class="space-y-4">
                                <div class="mb-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Heading</label>
                                    <input type="text" name="home_courses_heading"
                                        value="{{ $settings['home_courses_heading'] ?? 'Popular Courses' }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Sub-heading</label>
                                    <textarea name="home_courses_subheading" rows="3"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['home_courses_subheading'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'home'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Home Page Content
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