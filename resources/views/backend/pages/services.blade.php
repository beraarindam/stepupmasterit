@extends('backend.layouts.app')

@section('title', 'Services Page Management')
@section('breadcrumb', 'Admin / Page Management / Services')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Services Page Settings 🛠️</h2>
                <p class="text-gray-500 mt-1">Manage all the content specifically for your Services page.</p>
            </div>
            <a href="{{ route('admin.services.index') }}"
                class="flex items-center text-primary hover:text-blue-700 font-semibold transition-colors">
                <i class="fas fa-briefcase mr-2"></i> Manage Individual Services
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.update', 'services') }}" method="POST" enctype="multipart/form-data"
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
                                <input type="text" name="services_banner_heading"
                                    value="{{ $settings['services_banner_heading'] ?? 'Our Professional Services' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="services_banner_subheading"
                                    value="{{ $settings['services_banner_subheading'] ?? 'Tailored solutions to help you excel in the IT industry.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['services_banner_image']) && !empty($settings['services_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['services_banner_image']) }}" alt="Services Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="services_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>
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
                            <input type="text" name="services_section_heading"
                                value="{{ $settings['services_section_heading'] ?? 'Excellence in IT Training & Consulting' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Section Sub-heading</label>
                            <textarea name="services_section_subheading" rows="2"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['services_section_subheading'] ?? 'We offer a wide range of specialized services designed to bridge the gap between education and industry requirements.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📣 Bottom call to action
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA heading</label>
                                <input type="text" name="services_cta_heading"
                                    value="{{ $settings['services_cta_heading'] ?? 'Ready to Start Your Journey With Us?' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none"
                                    placeholder="You can use HTML, e.g. Ready to Start Your &lt;span&gt;Journey&lt;/span&gt;?">
                                <p class="text-xs text-gray-500 mt-1">HTML is allowed for highlights (e.g. wrap words in &lt;span&gt;).</p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA sub-heading</label>
                                <textarea name="services_cta_subheading" rows="2"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['services_cta_subheading'] ?? 'Join thousands of students who have transformed their careers through our industry-leading programs.' }}</textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primary button text</label>
                                <input type="text" name="services_cta_btn1_text"
                                    value="{{ $settings['services_cta_btn1_text'] ?? 'Enroll Now' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Primary button link</label>
                                <input type="text" name="services_cta_btn1_link"
                                    value="{{ $settings['services_cta_btn1_link'] ?? '#' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Secondary button text</label>
                                <input type="text" name="services_cta_btn2_text"
                                    value="{{ $settings['services_cta_btn2_text'] ?? 'Contact Admissions' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Secondary button link</label>
                                <input type="text" name="services_cta_btn2_link"
                                    value="{{ $settings['services_cta_btn2_link'] ?? '#' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 max-w-xl">
                        <label class="block text-sm font-medium text-gray-700 mb-1">CTA background image (optional)</label>
                        @if(!empty($settings['services_cta_background_image'] ?? ''))
                            <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                <img src="{{ asset($settings['services_cta_background_image']) }}" alt="Services CTA background"
                                    class="h-24 w-full object-cover rounded max-w-md">
                            </div>
                        @endif
                        <input type="file" name="services_cta_background_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                        <p class="text-xs text-gray-500 mt-1">If omitted, a solid blue gradient is used (no placeholder text).</p>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'services'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update Services Page Content
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