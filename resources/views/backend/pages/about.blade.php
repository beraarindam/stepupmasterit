@extends('backend.layouts.app')

@section('title', 'About Us Page Management')
@section('breadcrumb', 'Admin / Page Management / About Us')

@section('content')
    <div class="space-y-6 animate-fade-in-up">

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">About Us Page Settings 💡</h2>
                <p class="text-gray-500 mt-1">Manage all the content specifically for your About Us page.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.pages.about.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
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
                                <input type="text" name="about_banner_heading"
                                    value="{{ $settings['about_banner_heading'] ?? 'About Our Institution' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Sub-heading</label>
                                <input type="text" name="about_banner_subheading"
                                    value="{{ $settings['about_banner_subheading'] ?? 'Learn more about our mission and vision.' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Banner Image</label>
                                @if(isset($settings['about_banner_image']) && !empty($settings['about_banner_image']))
                                    <div class="mb-2 p-2 bg-gray-50 border rounded-lg inline-block">
                                        <img src="{{ asset($settings['about_banner_image']) }}" alt="About Banner"
                                            class="h-24 object-contain">
                                    </div>
                                @endif
                                <input type="file" name="about_banner_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x400px</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mission & Vision Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        🎯 Mission & Vision
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Our Mission</label>
                            <textarea name="about_mission" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none editor"
                                placeholder="State your mission statement here...">{{ $settings['about_mission'] ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Our Vision</label>
                            <textarea name="about_vision" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none editor"
                                placeholder="State your vision statement here...">{{ $settings['about_vision'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Why Choose Us Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        🤔 "Why Choose Us" Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Heading</label>
                                <input type="text" name="about_why_heading"
                                    value="{{ $settings['about_why_heading'] ?? 'Why Choose Step Up Master IT?' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Sub-heading</label>
                                <textarea name="about_why_subheading" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['about_why_subheading'] ?? 'We provide industry-leading education with a focus on practical skills and career success.' }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Experience Years Text</label>
                                <input type="text" name="about_exp_text" value="{{ $settings['about_exp_text'] ?? '10+' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Experience Label</label>
                                <input type="text" name="about_exp_label"
                                    value="{{ $settings['about_exp_label'] ?? 'Years of Excellence' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Core Values Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        💎 Core Values Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Heading</label>
                                <input type="text" name="about_values_heading"
                                    value="{{ $settings['about_values_heading'] ?? 'Core Values That Drive Us Forward' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Section Description</label>
                                <textarea name="about_values_description" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['about_values_description'] ?? 'Our foundation is built on principles that ensure we deliver excellence consistently.' }}</textarea>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Core Values List
                                (Title|Description)</label>
                            <textarea name="about_values_list" rows="5"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none text-sm font-mono"
                                placeholder="Excellence|We strive for the highest standards.&#10;Inclusivity|Education for all.">{{ $settings['about_values_list'] ?? "Excellence|We strive for the highest standards in everything we do.\nInclusivity|Education for all, regardless of background or status.\nInnovation|Embracing new technologies to enhance learning.\nPassion|We are dedicated to your success and growth." }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">One value per line. Format: Title|Description</p>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold text-gray-700 border-b pb-2 mb-4 text-indigo-700">
                        📣 Call to Action (CTA) Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA Heading</label>
                                <input type="text" name="about_cta_heading"
                                    value="{{ $settings['about_cta_heading'] ?? 'Ready to Start Your Journey With Us?' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">CTA Sub-heading</label>
                                <textarea name="about_cta_subheading" rows="2"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">{{ $settings['about_cta_subheading'] ?? 'Join thousands of students who have transformed their careers through our industry-leading programs.' }}</textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Btn 1 Text</label>
                                <input type="text" name="about_cta_btn1_text"
                                    value="{{ $settings['about_cta_btn1_text'] ?? 'Enroll Now' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Btn 1 Link</label>
                                <input type="text" name="about_cta_btn1_link"
                                    value="{{ $settings['about_cta_btn1_link'] ?? '#' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Btn 2 Text</label>
                                <input type="text" name="about_cta_btn2_text"
                                    value="{{ $settings['about_cta_btn2_text'] ?? 'Contact Admissions' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Btn 2 Link</label>
                                <input type="text" name="about_cta_btn2_link"
                                    value="{{ $settings['about_cta_btn2_link'] ?? '#' }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                @include('backend.pages.seo_partial', ['page' => 'about'])

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-10 rounded-lg shadow-md transition-all duration-200 flex items-center hover:scale-105">
                        <i class="fas fa-save mr-2"></i> Update About Us Content
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